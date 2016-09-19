<?php namespace ZN\DataTypes\XML;

use Html;

interface BuilderInterface
{
    //--------------------------------------------------------------------------------------------------------
    // Version
    //--------------------------------------------------------------------------------------------------------
    //
    // Genel Kullanım: Bir XML belgesinin versiyonunu oluşturur.
    //
    // @param  string   $version -> 1.0
    // @return this
    //
    //--------------------------------------------------------------------------------------------------------
    public function version(String $version = '1.0') : Builder;

    //--------------------------------------------------------------------------------------------------------
    // Encoding
    //--------------------------------------------------------------------------------------------------------
    //
    // Genel Kullanım: Bir XML belgesinin kodlama türünü belirtir.
    //
    // @param  string   $encoding -> UTF-8
    // @return this
    //
    //--------------------------------------------------------------------------------------------------------
    public function encoding(String $encoding = 'UTF-8') : Builder;

    //--------------------------------------------------------------------------------------------------------
    // Build
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array  $data
    // @param string $version
    // @param string $encoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function do(Array $data, String $version = NULL, String $encoding = NULL) : String;
}