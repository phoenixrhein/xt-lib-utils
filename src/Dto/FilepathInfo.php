<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace De\Xovatec\Dto;

/**
 * Description of FilePathInfo
 *
 * @author Bastian
 */
class FilepathInfo
{

    /**
     * 
     * @var string
     */
    private string $dirname;

    /**
     * 
     * @var string
     */
    private string $basename;

    /**
     * 
     * @var string
     */
    private string $filename;

    /**
     * 
     * @var string
     */
    private string $extension;

    /**
     * Get dirname
     * 
     * @return string
     */
    public function getDirname(): string
    {
        return $this->dirname;
    }

    /**
     * Get basename
     * 
     * @return string
     */
    public function getBasename(): string
    {
        return $this->basename;
    }

    /**
     * Get filname
     * 
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * Get extension
     * 
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * Set dirname
     * 
     * @param string $dirname
     * @return void
     */
    public function setDirname(string $dirname): void
    {
        $this->dirname = $dirname;
    }

    /**
     * Set basename
     * 
     * @param string $basename
     * @return void
     */
    public function setBasename(string $basename): void
    {
        $this->basename = $basename;
    }

    /**
     * Set filename
     * 
     * @param string $filename
     * @return void
     */
    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    /**
     * Set extension
     * 
     * @param string $extension
     * @return void
     */
    public function setExtension(string $extension): void
    {
        $this->extension = $extension;
    }

}
