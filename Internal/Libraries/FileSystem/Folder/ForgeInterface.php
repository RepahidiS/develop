<?php namespace ZN\FileSystem\Folder;

interface ForgeInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // create()
    //--------------------------------------------------------------------------------------------------------
    //
    // Dizin oluşturmak için kullanılır.
    //
    //--------------------------------------------------------------------------------------------------------
    public function create(String $file, Int $permission = 0755, Bool $recursive = true) : Bool;

    //--------------------------------------------------------------------------------------------------------
    // rename()
    //--------------------------------------------------------------------------------------------------------
    //
    // Dosya veya dizinin adını değiştirmek için kullanılır.
    //
    //--------------------------------------------------------------------------------------------------------
    public function rename(String $oldName, String $newName) : Bool;

    //--------------------------------------------------------------------------------------------------------
    // deleteEmpty()
    //--------------------------------------------------------------------------------------------------------
    //
    // Boş bir dizini silmek için kullanılır.
    //
    //--------------------------------------------------------------------------------------------------------
    public function deleteEmpty(String $folder) : Bool;

    //--------------------------------------------------------------------------------------------------------
    // delete()
    //--------------------------------------------------------------------------------------------------------
    //
    // Bir dizini içindekilerle birlikte silmek için kullanılır.
    //
    //--------------------------------------------------------------------------------------------------------
    public function delete(String $name) : Bool;

    //--------------------------------------------------------------------------------------------------------
    // Copy()
    //--------------------------------------------------------------------------------------------------------
    //
    // Bir dizini belirtilen başka bir konuma kopyalamak için kullanılır. Bu işlem kopyalanacak dizine
    // ait diğer alt dizin ve dosyaları da kapsamaktadır.
    //
    //--------------------------------------------------------------------------------------------------------
    public function copy(String $source, String $target) : Bool;

    //--------------------------------------------------------------------------------------------------------
    // change()
    //--------------------------------------------------------------------------------------------------------
    //
    // PHP'nin aktif çalışma dizinini değiştirmek için kullanılır.
    //
    //--------------------------------------------------------------------------------------------------------
    public function change(String $name) : Bool;

    //--------------------------------------------------------------------------------------------------------
    // permission()
    //--------------------------------------------------------------------------------------------------------
    //
    // Bir dizin veya dosyaya yetki vermek için kullanılır.
    //
    //--------------------------------------------------------------------------------------------------------
    public function permission(String $name, Int $permission = 0755) : Bool;
}
