<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace application;

/**
 * Class BaseComponent
 * @package application
 */
Abstract class BaseComponent {

    protected  $currentVersion = "1.0";


    /**
     * Loads a component based on current version
     * @return mixed
     */
    abstract public function loadComponent();

    /**
     * Gets the current version of the component
     * @return string
     */
    public function getCurrentVersion()
    {
        return $this->currentVersion;
    }

    /**
     * Returns an array of available versions for a component
     * @return array
     */
    public function getAvailableVersions()
    {
        return array($this->getCurrentVersion());
    }

    /**
     * Sets the version to use if called before loadComponent to the provided version if on the list of available versions
     * @param $version
     */
    public function setCurrentVersion($version)
    {
        if(in_array($version, $this->getAvailableVersions()))
        {
            $this->currentVersion = $version;
        }
    }
}
