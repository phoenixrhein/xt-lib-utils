<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

include __DIR__ . '/../vendor/autoload.php';
//include __DIR__ . '/../../Utils/ArrayUtils.php';



/**
 * Log helper
 */
class LogHelper {
    
    /**
     * 
     * @var Logger
     */
    public Logger $logger;
    
    /**
     * 
     * @var LogHelper
     */
    private static ?LogHelper $logHelper = null;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->logger = new Logger('unittest');
        $logDirectory = dirname(dirname(dirname(dirname(__FILE__)))) . '/resources/logs/xt-lib-utils.log';
        $this->logger->pushHandler(new StreamHandler($logDirectory, Logger::DEBUG));
    }
    
    /**
     * Get log helper
     * 
     * @return LogHelper
     */
    public static function getLogger(): Logger
    {
        if (self::$logHelper instanceof LogHelper === false) {
            self::$logHelper = new LogHelper();
        }
        
        return self::$logHelper->logger;
    }
    
}

        
        
