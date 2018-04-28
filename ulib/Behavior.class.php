<?php
namespace Sys;

class Behavior{
	
	
    public static function timeline($param = array()) {
        
		//return $_node;
		/*
		$aaa = md5(CONTROLLER_NAME.ACTION_NAME);
		if($aaa == '1079d4eb6876a3e3a5cb7d2a87413e5a'){
			
			$gamelist = M('game')->select();
			$i = 0;
			foreach($gamelist as $v){
				$data = array();
				$data['id'] = 60000+intval($v['game_id']);	
				$data['node'] = md5($aaa.$v['game_id']);
				$data['notes'] = $v['game_name'];
				if(!M('be_node')->where($data)->find()){
					$a = M('be_node')->add($data);
					if($a) $i++;
				}
				
			}
			
			return $i;
			
		}else{
			return $aaa;
		}
		*/
		$data = array();
		$node = md5(CONTROLLER_NAME.ACTION_NAME);
		if($node == '1079d4eb6876a3e3a5cb7d2a87413e5a'){
			$node = md5($node.$param['gameid']);
		}
		
		
		
		
		
    }
     
    
}
?>