<?php namespace ZN\FileSystem;

use CLController, InformationAbility, Config, Converter;
use ZN\FileSystem\Exception\FileNotFoundException;
use ZN\FileSystem\Exception\FileRemoteUploadException;
use ZN\FileSystem\Exception\FileRemoteDownloadException;
use ZN\FileSystem\Exception\FolderAllreadyException;
use ZN\FileSystem\Exception\FolderNotFoundException;
use ZN\FileSystem\Exception\FolderChangeDirException;
use ZN\FileSystem\Exception\FolderChangeNameException;
use ZN\FileSystem\Exception\IOException;

class InternalFTP extends CLController implements FTPInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    const config = 'FileSystem:ftp';

    //--------------------------------------------------------------------------------------------------------
    // Information Ability
    //--------------------------------------------------------------------------------------------------------
    //
    // Information Ability Methods
    //
    //--------------------------------------------------------------------------------------------------------
    use InformationAbility;

    //--------------------------------------------------------------------------------------------------------
    // Protected $connect
    //--------------------------------------------------------------------------------------------------------
    //
    // @const resource
    //
    //--------------------------------------------------------------------------------------------------------
    protected $connect = NULL;

    //--------------------------------------------------------------------------------------------------------
    // Protected $login
    //--------------------------------------------------------------------------------------------------------
    //
    // @const resource
    //
    //--------------------------------------------------------------------------------------------------------
    protected $login = NULL;

    //--------------------------------------------------------------------------------------------------------
    // __construct()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $config: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function __construct(Array $config = [])
    {
        parent::__construct();

        if( ! empty($config) )
        {
            $config = Config::set('FileSystem', 'ftp', $config);
        }
        else
        {
            $config = FILESYSTEM_FTP_CONFIG;
        }

        $this->_connect($config);
    }

    //--------------------------------------------------------------------------------------------------------
    // createFolder()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $path: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function createFolder(String $path) : Bool
    {
        if( ftp_mkdir($this->connect, $path) )
        {
            return true;
        }
        else
        {
            throw new FolderAllreadyException($path);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // deleteFolder()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $path: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function deleteFolder(String $path) : Bool
    {
        if( ftp_rmdir($this->connect, $path) )
        {
            return true;
        }
        else
        {
            throw new FolderNotFoundException($path);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // changeFolder()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $path: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function changeFolder(String $path) : Bool
    {
        if( ftp_chdir($this->connect, $path) )
        {
            return true;
        }
        else
        {
            throw new FolderChangeDirException($path);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // rename()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $oldName: empty
    // @param string $newName: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function rename(String $oldName, String $newName) : Bool
    {
        if( ftp_rename($this->connect, $oldName, $newName) )
        {
            return true;
        }
        else
        {
            throw new FolderChangeNameException($oldName);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // deleteFile()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $path: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function deleteFile(String $path) : Bool
    {
        if( ftp_delete($this->connect, $path) )
        {
            return true;
        }
        else
        {
            throw new FileNotFoundException($path);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // upload()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $localPath : empty
    // @param string $remotePath: empty
    // @param string $type      : binary, ascii
    //
    //--------------------------------------------------------------------------------------------------------
    public function upload(String $localPath, String $remotePath, String $type = 'ascii') : Bool
    {
        if( ftp_put($this->connect, $remotePath, $localPath, Converter::toConstant($type, 'FTP_')) )
        {
            return true;
        }
        else
        {
            throw new FileRemoteUploadException($localPath);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // dowload()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $remotePath: empty
    // @param string $localPath : empty
    // @param string $type      : binary, ascii
    //
    //--------------------------------------------------------------------------------------------------------
    public function download(String $remotePath, String $localPath, String $type = 'ascii') : Bool
    {
        if( ftp_get($this->connect, $localPath, $remotePath, Converter::toConstant($type, 'FTP_')) )
        {
            return true;
        }
        else
        {
            throw new FileRemoteDownloadException($localPath);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // permission()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $path: empty
    // @param int $type   : 0755
    //
    //--------------------------------------------------------------------------------------------------------
    public function permission(String $path, Int $type = 0755) : Bool
    {
        if( ftp_chmod($this->connect, $type, $path) )
        {
            return true;
        }
        else
        {
            throw new IOException('Error', 'emptyVariable', 'Connect');
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // files()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $path     : empty
    // @param string $extension: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function files(String $path, String $extension = NULL) : Array
    {
        $list = ftp_nlist($this->connect, $path);

        if( ! empty($list) ) foreach( $list as $file )
        {
            if( $file !== '.' && $file !== '..' )
            {
                if( ! empty($extension) && $extension !== 'dir' )
                {
                    if( extension($file) === $extension )
                    {
                        $files[] = $file;
                    }
                }
                else
                {
                    if( $extension === 'dir' )
                    {
                        $extens = extension($file);

                        if( empty($extens) )
                        {
                            $files[] = $file;
                        }
                    }
                    else
                    {
                        $files[] = $file;
                    }
                }
            }
        }

        if( ! empty($files) )
        {
            return $files;
        }
        else
        {
            $this->error = lang('Error', 'emptyVariable', '@files');

            return [];
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // fileSize()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $path   : empty
    // @param string $type   : b, kb, mb, gb
    // @param int    $decimal: 2
    //
    //--------------------------------------------------------------------------------------------------------
    public function fileSize(String $path, String $type = 'b', Int $decimal = 2) : Float
    {
        $size = 0;

        $extension = extension($path);

        if( ! empty($extension) )
        {
            $size = ftp_size($this->connect, $path);
        }
        else
        {
            if( $this->files($path) )
            {
                foreach( $this->files($path) as $val )
                {
                    $size += ftp_size($this->connect, $path."/".$val);
                }

                $size += ftp_size($this->connect, $path);
            }
            else
            {
                $size += ftp_size($this->connect, $path);
            }
        }

        if( $type === "b" )
        {
            return  $size;
        }
        if( $type === "kb" )
        {
            return round($size / 1024, $decimal);
        }
        if( $type === "mb" )
        {
            return round($size / (1024 * 1024), $decimal);
        }
        if( $type === "gb" )
        {
            return round($size / (1024 * 1024 * 1024), $decimal);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // differentConnection()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $config: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function differentConnection(Array $config) : InternalFTP
    {
        return new self($config);
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected close()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _close() : Bool
    {
        if( ! empty($this->connect) )
        {
            return ftp_close($this->connect);
        }

        return false;
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected connect()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $config: empty
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _connect($config)
    {
        // ----------------------------------------------------------------------------
        // FTP BAĞLANTI AYARLARI YAPILANDIRILIYOR
        // ----------------------------------------------------------------------------
        $host     = $config['host'];
        $port     = $config['port'];
        $timeout  = $config['timeout'];
        $user     = $config['user'];
        $password = $config['password'];
        $ssl      = $config['sslConnect'];
        // ----------------------------------------------------------------------------

        // Bağlantı türü ayarına göre ssl veya normal
        // bağlatı yapılıp yapılmayacağı belirlenir.
        $this->connect =    ( $ssl === false )
                            ? @ftp_connect($host, $port, $timeout)
                            : @ftp_ssl_connect($host, $port, $timeout);

        if( empty($this->connect) )
        {
            throw new IOException('Error', 'emptyVariable', 'Connect');
        }

        $this->login = ftp_login($this->connect, $user, $password);

        if( empty($this->login) )
        {
            throw new IOException('Error', 'emptyVariable', 'Login');
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // __destruct()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function __destruct()
    {
        $this->_close();
    }
}
