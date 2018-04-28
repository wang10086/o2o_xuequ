<?php 

namespace Think\Session\Driver;

class Redis {

    /**
     * 数据库句柄
     */
   protected $hander; 

    /**
     * 打开Session 
     * @access public 
     * @param string $savePath 
     * @param mixed $sessName  
     */
    public function open($savePath, $sessName) { 
       
       if ( !extension_loaded('redis') ) {
           E(L('_NOT_SUPPERT_').':redis');
       }
       
       $options = array (
               'host'          => C('REDIS_HOST') ? C('REDIS_HOST') : '127.0.0.1',
               'port'          => C('REDIS_PORT') ? C('REDIS_PORT') : 6379,
               'persistent'    => false,
               'expire'        => C('SESSION_EXPIRE')?C('SESSION_EXPIRE'):ini_get('session.gc_maxlifetime'),
               'timeout'       => false,
               'prefix'        => C('SESSION_PREFIX') ? C('SESSION_PREFIX') : '',
               'auth'          => false,
       );
      
       $this->options =  $options;
       
       $func = $options['persistent'] ? 'pconnect' : 'connect';
       $this->handler  = new \Redis;
       $options['timeout'] === false ?
       $this->handler->$func($options['host'], $options['port']) :
       $this->handler->$func($options['host'], $options['port'], $options['timeout']);
       if ( $options['auth'] !== false ) $this->hander->auth($options['auth']);
    } 

    /**
     * 关闭Session 
     * @access public 
     */
   public function close() {
       $this->gc($this->options['expire']); 
       if ($this->hander != null) {
          $this->hander->close(); 
       }
       return 0;
   } 

    /**
     * 读取Session 
     * @access public 
     * @param string $sessID 
     */
   public function read($sessID) { 
       $value = $this->handler->get($this->options['prefix'].$sessID);
       //$jsonData  = json_decode( $value, true );
       //return ($jsonData === NULL) ? $value : $jsonData;
       return $value;
   } 

    /**
     * 写入Session 
     * @access public 
     * @param string $sessID 
     * @param String $sessData  
     */
   public function write($sessID,$sessData) { 
       
        $expire  =  $this->options['expire'];
        
        $key     =   $this->options['prefix'].$sessID;
        //对数组/对象数据进行缓存处理，保证数据完整性
        $value   =   $sessData;
        if(is_int($expire)) {
            $result = $this->handler->setex($key, $expire, $value);
        }else{
            $result = $this->handler->set($key, $value);
        }
        return $result; 
   } 

    /**
     * 删除Session 
     * @access public 
     * @param string $sessID 
     */
   public function destroy($sessID) { 
       $this->hander->delete($this->options['prefix'].$sessID);
   } 

    /**
     * Session 垃圾回收
     * @access public 
     * @param string $sessMaxLifeTime 
     */
   public function gc($sessMaxLifeTime) { 
        
   } 

}