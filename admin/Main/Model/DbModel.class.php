<?php 
namespace Main\Model;
use Think\Model;
use Sys\P;
class DbModel extends Model{
	
	// 初始化函数
	public function _initialize()
	{
    }
	
	/**
	 * 删除信息
	 * @return array
	 */
	public function db_delete($table,$where){
		
		$db = M($table);
		//条件
		$iddel = $db->where($where)->delete();
		if($iddel){
			$data = P::SUCCESS;
		}else{
			$data = P::ERROR;
		}
		
		return $data;
	}
	
	
	/**
	 * 新增信息
	 * @return array
	 */
	public function db_add($table,$data){
		
		$db = M($table);
		$idadd = $db->add($data);
		if($idadd){
			$data = P::SUCCESS;
		}else{
			$data = P::ERROR;
		}
		
		return $data;
	}
	
	/**
	 * 修改信息
	 * @return array
	 */
	public function db_update($table,$data,$where){
		
		$db = M($table);
		$idedit = $db->data($data)->where($where)->save();
		if($idedit){
			$data = P::SUCCESS;
		}else{
			$data = P::ERROR;
		}
		
		return $data;
	}
	
	
	
	
}
?>