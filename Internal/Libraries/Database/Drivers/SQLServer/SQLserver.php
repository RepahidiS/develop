<?php namespace ZN\Database\Drivers;

use ZN\Database\Abstracts\DriverConnectionMappingAbstract;

class SQLServerDriver extends DriverConnectionMappingAbstract
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Operators
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $operators =
    [
        'like' => '%'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Statements
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $statements =
    [
        'autoincrement' => 'IDENTITY(1,1)',
        'primarykey'    => 'PRIMARY KEY',
        'foreignkey'    => 'FOREIGN KEY',
        'unique'        => 'UNIQUE',
        'null'          => 'NULL',
        'notnull'       => 'NOT NULL',
        'exists'        => 'EXISTS',
        'notexists'     => 'NOT EXISTS',
        'constraint'    => 'CONSTRAINT',
        'default'       => 'DEFAULT'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Variable Types
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $variableTypes =
    [
        'int'           => 'INT',
        'smallint'      => 'SMALLINT',
        'tinyint'       => 'TINYINT',
        'mediumint'     => 'INT',
        'bigint'        => 'BIGINT',
        'decimal'       => 'DECIMAL',
        'double'        => 'DOUBLE PRECISION',
        'float'         => 'FLOAT',
        'char'          => 'CHAR',
        'varchar'       => 'VARCHAR',
        'tinytext'      => 'VARCHAR(255)',
        'text'          => 'VARCHAR(65535)',
        'mediumtext'    => 'VARCHAR(16277215)',
        'longtext'      => 'VARCHAR(16277215)',
        'date'          => 'DATE',
        'datetime'      => 'DATETIME',
        'time'          => 'TIME',
        'timestamp'     => 'TIMESTAMP'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Construct
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        \Support::func('sqlsrv_connect', 'SQL Server');
    }

    //--------------------------------------------------------------------------------------------------------
    // Connect
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $config
    //
    //--------------------------------------------------------------------------------------------------------
    public function connect($config = [])
    {
        $this->config = $config;

        $server =   ( ! empty($this->config['server']) )
                    ? $this->config['server']
                    : $this->config['host'];

        if( ! empty($this->config['port']) )
        {
            $server .= ', '.$this->config['port'];
        }

        $connection = array
        (
            'UID'                   => $this->config['user'],
            'PWD'                   => $this->config['password'],
            'Database'              => $this->config['database'],
            'ConnectionPooling'     => 0,
            'CharacterSet'          => $this->config['charset'],
            'Encrypt'               => $this->config['encode'],
            'ReturnDatesAsStrings'  => 1
        );

        $this->connect = @sqlsrv_connect($server, $connection);

        if( empty($this->connect) )
        {
            die(getErrorMessage('Database', 'connectError'));
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Exec
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $query
    // @param array  $security
    //
    //--------------------------------------------------------------------------------------------------------
    public function exec($query, $security = NULL)
    {
        if( empty($query) )
        {
            return false;
        }

        return sqlsrv_query($this->connect, $query);
    }

    //--------------------------------------------------------------------------------------------------------
    // Multi Query
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $query
    // @param array  $security
    //
    //--------------------------------------------------------------------------------------------------------
    public function multiQuery($query, $security = NULL)
    {
        return $this->query($query, $security);
    }

    //--------------------------------------------------------------------------------------------------------
    // Query
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $query
    // @param array  $security
    //
    //--------------------------------------------------------------------------------------------------------
    public function query($query, $security = NULL)
    {
        return $this->query = $this->exec($query);
    }

    //--------------------------------------------------------------------------------------------------------
    // Trans Start
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function transStart()
    {
        return sqlsrv_begin_transaction($this->connect);
    }

    //--------------------------------------------------------------------------------------------------------
    // Trans Roll Back
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function transRollback()
    {
        return sqlsrv_rollback($this->connect);
    }

    //--------------------------------------------------------------------------------------------------------
    // Trans Commit
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function transCommit()
    {
        return sqlsrv_commit($this->connect);
    }

    //--------------------------------------------------------------------------------------------------------
    // Insert ID
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function insertID()
    {
        $this->query('SELECT @@IDENTITY AS insert_id');
        $row = $query->row();

        return $row->insert_id;
    }

    //--------------------------------------------------------------------------------------------------------
    // Column Data
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $column
    //
    //--------------------------------------------------------------------------------------------------------
    public function columnData($col = '')
    {
        if( empty($this->query) )
        {
            return false;
        }

        $columns = [];

        foreach( sqlsrv_field_metadata($this->query) as $field )
        {
            $fieldName = $field['Name'];

            $columns[$fieldName]                = new \stdClass();
            $columns[$fieldName]->name          = $fieldName;
            $columns[$fieldName]->type          = $field['Type'];
            $columns[$fieldName]->maxLength     = $field['Size'];
            $columns[$fieldName]->primaryKey    = NULL;
            $columns[$fieldName]->default       = NULL;
        }

        if( isset($columns[$col]) )
        {
            return $columns[$col];
        }

        return $columns;
    }

    //--------------------------------------------------------------------------------------------------------
    // Num Rows
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function numRows()
    {
        if( ! empty($this->query) )
        {
            return sqlsrv_num_rows($this->query);
        }
        else
        {
            return 0;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Columns
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function columns()
    {
        if( empty($this->query) )
        {
            return false;
        }

        $columns = [];
        $num_fields = $this->numFields();

        for($i=0; $i < $num_fields; $i++)
        {
            $columns[] = sqlsrv_get_field($this->query, $i);
        }

        return $columns;
    }

    //--------------------------------------------------------------------------------------------------------
    // Num Fields
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function numFields()
    {
        if( ! empty($this->query) )
        {
            return sqlsrv_num_fields($this->query);
        }
        else
        {
            return 0;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Real Escape String
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function realEscapeString($data)
    {
        return \Security::escapeStringEncode($data);
    }

    //--------------------------------------------------------------------------------------------------------
    // Error
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function error()
    {
        if( ! empty($this->connect) )
        {
            $error = sqlsrv_errors(SQLSRV_ERR_ERRORS);
            return $error['message'];
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Fetch Array
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function fetchArray()
    {
        if( ! empty($this->query) )
        {
            return sqlsrv_fetch_array($this->query, SQLSRV_FETCH_BOTH);
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Fetch Assoc
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function fetchAssoc()
    {
        if( ! empty($this->query) )
        {
            return sqlsrv_fetch_array($this->query, SQLSRV_FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Fetch Row
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function fetchRow()
    {
        if( ! empty($this->query) )
        {
            return sqlsrv_fetch($this->query, SQLSRV_FETCH_ASSOC);
        }
        else
        {
            return 0;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Affected Rows
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function affectedRows()
    {
        if( ! empty($this->connect) )
        {
            return sqlsrv_rows_affected($this->connect);
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Close
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function close()
    {
        if( ! empty($this->connect) )
        {
            @sqlsrv_close($this->connect);
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Version
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function version()
    {
        if( ! empty($this->connect) )
        {
            $info = sqlsrv_server_info($this->connect);
            return $info['SQLServerVersion'];
        }
        else
        {
            return false;
        }
    }
}
