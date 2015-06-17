<?php

namespace Prelinker\Config;

use Exception;

class ConfigLoader
{
    private $env;
    private $defaultTier;
    private $envKeyName;
    private $configFilePathTemplate;

    /**
     * Create a ConfigLoader
     * @param Array  $env                    Environment variables (usually $_ENV)
     * @param string $defaultTier            Default tier (if the environment variable does not exists)
     * @param string $envKeyName             Tier environment variable name
     * @param string $configFilePathTemplate Path to config file ("{tier}" will be replaced with the actual tier name)
     */
    public function __construct(
        Array $env,
        $defaultTier = 'prod',
        $envKeyName = 'TIER',
        $configFilePathTemplate = '/data/main/prod/prelinker-config/build/%tier%.php'
    ) {
        $this->env = $env;
        $this->defaultTier = $defaultTier;
        $this->envKeyName = $envKeyName;
        $this->configFilePathTemplate = $configFilePathTemplate;
    }

    /**
     * Load config
     */
    public function load()
    {
        $configFilePath = $this->configFilePath();

        if (!file_exists($configFilePath) || !is_readable($configFilePath)) {
            return [];
        }

        return include $configFilePath;
    }

    /**
     * This ConfigLoader tier name
     * @return string
     */
    public function tier() {
        return array_key_exists($this->envKeyName, $this->env) ? $this->env[$this->envKeyName] : $this->defaultTier;
    }

    /**
     * Export config services as Docker links environment variables
     * @param  Array  &$env the array to populate the environment variable variables (usually $_ENV)
     */
    public function dockerify(Array &$env)
    {
        foreach ($this->load() as $key => $value) {

        }
    }

    private function configFilePath() {
        return str_replace('%tier%', $this->tier(), $this->configFilePathTemplate);
    }
}
