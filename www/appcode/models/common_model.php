<?php
class Common_model extends CI_Model
{
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    	

    function member_id($nx_user_code)
    {
    
    	$this->db->select('nx_id');
    	$this->db->from('NX_MEMBER');
    	$this->db->where('nx_user_code',$nx_user_code);
    	$query = $this->db->get()->row_array();
    	 
    	if(count($query)>0){
    		$nx_id = $query['nx_id'];
    	}else{
    		$nx_id = "";
    	}
    	 
    	return $nx_id;
    
    }
    

    function member_point()
    {
    
    	$this->db->select('nx_point');
    	$this->db->from('NX_MEMBER');
    	$this->db->where('nx_user_code',$this->session->userdata('MEM_CODE'));
    	$query = $this->db->get()->row_array();
    	
    	$point = $query['nx_point'];
    	
    	return $point;
    
    }
    
    
    
    function member_point_update($nx_user_code,$point,$point_type='0',$msg='')
    {
    
    	$this->db->select('nx_point');
    	$this->db->from('NX_MEMBER');
    	$this->db->where('nx_user_code',$nx_user_code);
    
    	$query = $this->db->get();
    	if ($query->num_rows() > 0)
    	{
	    
	    		$row = $query->row();
	    		$befor_point = $row->nx_point;
	    		
	    		if($point_type=="0"){	//��
	    			$after_point = $befor_point+$point;
	    		}else{
	    			$after_point = $befor_point-$point;;
	    		}
	    
	    		//�α�����
	    		$data = array(
	    				'nx_user_code' => $nx_user_code ,
	    				'befor_point' => $befor_point ,
	    				'point' => $point ,
	    				'after_point' => $after_point ,
	    				'point_log' => $msg ,
	    				'point_type' => $point_type ,
	    				'regDate' => TIME_YMDHIS
	    		);
	    
	    		$this->db->insert('NX_MEMBER_POINT_LOG', $data);
	    
	    		//����Ʈ ������Ʈ
	    		if($point_type=="0"){	//��
	    			$this->db->set('nx_point', 'nx_point+'.$point, FALSE);
	    		}else{
	    			$this->db->set('nx_point', 'nx_point-'.$point, FALSE);
	    		}
    			$this->db->where('nx_user_code',$nx_user_code);
    			$this->db->update('NX_MEMBER');
    
    
    		}else{
    			$point = "";
    		}
    		 
    		 
    		 
    		 
    		 
    		 
    		return true;
    
    	}
    
    
    
    

    function post_check()
    {

    	$DONG	= secure($this->input->post('DONG'));
    	
    	$this->db->select('*');
    	$this->db->from('ZIPCODE');
    	$this->db->like('DONG',$DONG,'both');
    	$this->db->or_like('RI',$DONG,'both');
		$query = $this->db->get();
        return $query->result();
    	
    
    }

    function post_group_check()
    {
    
    	$DONG	= secure($this->input->post('DONG'));
    	 
    	$this->db->select('SIDO,GUGUN,DONG,RI');
    	$this->db->from('ZIPCODE');
    	$this->db->group_by(array("GUGUN", "DONG","RI"));
    	$this->db->like('DONG',$DONG,'both');
    	$this->db->or_like('RI',$DONG,'both');
    	$query = $this->db->get();
    	return $query->result();
    	 
    
    }
    
    


    //select  �⺻���� ����
    function tbl_select_1($tbl,$sfield,$field1='',$field1_val='',$field2='',$field2_val='',$orderbyField,$orderbySort,$litmit)
    {
    
    	$this->db->select($sfield);
    	$this->db->from($tbl);
    
    	if($field1!=""){
    		$this->db->where($field1, $field1_val);
    	}
    	if($field2!=""){
    		$this->db->where($field2, $field2_val);
    	}
    
    	if($orderbyField!="" || $orderbySort!=""){
    		$this->db->order_by($orderbyField, $orderbySort);
    	}
    
    	if($litmit!=""){
    		$this->db->limit($litmit);
    	}
    
    	$query = $this->db->get();
    	return $query->result();
    
    }


    //select  �⺻���� ����
    function tbl_select_2($tbl,$sfield,$field1='',$field1_val='',$field2='',$field2_val='',$field3='',$field3_val='',$orderbyField,$orderbySort,$litmit)
    {
    
    	$this->db->select($sfield);
    	$this->db->from($tbl);
    
    	if($field1!=""){
    		$this->db->where($field1, $field1_val);
    	}
    	if($field2!=""){
    		$this->db->where($field2, $field2_val);
    	}

    	if($field3!=""){
    		$this->db->where($field3, $field3_val);
    	}
    	
    	if($orderbyField!="" || $orderbySort!=""){
    		$this->db->order_by($orderbyField, $orderbySort);
    	}
    
    	if($litmit!=""){
    		$this->db->limit($litmit);
    	}
    
    	$query = $this->db->get();
    	return $query->result();
    
    }
    

    //select  �⺻���� ����
    function tbl_select($tbl,$sfield,$field1='',$field1_val='',$field2='',$field2_val='',$orderbyField,$orderbySort,$litmit)
    {
    
    	$this->db->select($sfield);
    	$this->db->from($tbl);

    	if($field1!=""){
    		$this->db->where($field1, $field1_val);
    	}
    	if($field2!=""){
    		$this->db->where($field2, $field2_val);
    	}

    	if($orderbyField!="" || $orderbySort!=""){
    		$this->db->order_by($orderbyField, $orderbySort);
    	}
		
    	if($litmit!=""){
    		$this->db->limit($litmit);
    	}

    	$query = $this->db->get();
    	return $query->row_array();
    
    }


	//�Ѱ����� ���ϴ� ����
    function tbl_count($tbl,$field1='',$field1_val='',$field2='',$field2_val='')
    {
    
       //	$query = $this->db->query("SELECT count(*) as tot FROM ESTIMATE WHERE er_code='ER1378997770' ");
		//$query = $this->db->get()->row_array();
		//echo $field1_val;
		if($field1!=""){
			$this->db->where($field1, $field1_val);
		}
		if($field2!=""){
			$this->db->where($field2, $field2_val);
		}
		$this->db->from($tbl);
		$tot = $this->db->count_all_results();
		
		
		
    	return $tot;
    
    }
    

    //������ ���ϴ� ����
    function tbl_sum($tbl,$sfield,$field1='',$field1_val='',$field2='',$field2_val='')
    {

    	if($field1!=""){
    		$this->db->where($field1, $field1_val);
    	}
    	if($field2!=""){
    		$this->db->where($field2, $field2_val);
    	}
    	$this->db->select_sum($sfield);
    	$tot = $this->db->get($tbl);
    
    
    
    	return $tot;
    
    }
    
    //������ ���� select
    function cust_query($query)
    {
    
    	$query = $this->db->query($query);
    	return $query->row_array();
    
    }

    
    //������ ���� select
    function cust_query_list($query)
    {
    
    	$query = $this->db->query($query);
    	return $query->result();
    
    }
    
    
    //������ select
    function dataone($tbl,$sfield,$field1='',$field1_val='',$field2='',$field2_val='')
    {

    	$this->db->select($sfield);
    	
    	if($field1!=""){
    		$this->db->where($field1, $field1_val);
    	}
    	if($field2!=""){
    		$this->db->where($field2, $field2_val);
    	}
    	$this->db->from($tbl);
		$this->db->limit(1);

    	$query = $this->db->get()->row_array();    
    	
    	if($sfield=="count(*) as tot"){
    		$return = $query['tot'];
    	}else{
    		$return = $query[$sfield];
    	}
    
    	return $return;
    
    }
    
    
    
    
    
    
    
    function photo_count($tbl,$idx)
    {
		
		
		$this->db->select('count(*) as tot');
		$this->db->from('TBL_PHOTO');
		$this->db->where('tp_tbl',$tbl);
		$this->db->where('tp_tbl_idx',$idx);
		$this->db->limit(1);
		$query = $this->db->get();
        return $query->row_array();

    }
    

    //����Ʈ
    function photo_list($tbl,$idx)
    {
    
    	$this->db->select('*');
    	$this->db->from('TBL_PHOTO');
    	$this->db->where('tp_tbl',$tbl);
    	$this->db->where('tp_tbl_idx',$idx);
    	$this->db->order_by("tp_idx", "desc");
    	$query = $this->db->get();
    
    
    	return $query->result();
    
    }
    
    
    
    //���� ���� ����
    function photo_ins($tp_tbl,$tp_tbl_idx,$tp_filetype,$tp_filepath,$tp_filename,$tp_filename_thumb,$cp_type){
    	
    	$data = array(
    			'tbl_name' => $tp_tbl ,
    			'code' => $tp_tbl_idx ,
    			'filetype' => $tp_filetype ,
    			'filepath' => $tp_filepath ,
    			'filename' => $tp_filename ,
    			'filename_thumb' => $tp_filename_thumb ,
    			'cp_type' => $cp_type ,
    			'regDate' => TIME_YMDHIS
    	);
    	
    	$this->db->insert('NX_PHOTO', $data);
    	return true;    	
    	
    }

    function photo_del($tbl_name,$code,$cp_type)
    {
    
    	
    	$this->db->select('filename,filename_thumb,filepath');
    	$this->db->from('NX_PHOTO');
    	$this->db->where('tbl_name',$tbl_name);
    	$this->db->where('code',$code);
    	$this->db->where('cp_type',$cp_type);
    	
    	
    	$query = $this->db->get();
    	if ($query->num_rows() > 0)
    	{
    		$row = $query->row();
    		
    		$filename = $row->filename;
    		$filename_thumb = $row->filename_thumb;
    		$filepath = $row->filepath;
    		
    		unlink(".".$filepath.$filename);
    		
    		if($filename_thumb != ""){
    			unlink(".".$filepath.$filename_thumb);
    		}
    	}
    	
    	
    	
    	$this->db->delete('NX_PHOTO', array('tbl_name' => $tbl_name,'code' => $code,'cp_type' => $cp_type));
    
    	return true;
    
    }
    
    

    function statstic_log(){
    	
    	$data = array(
    			'user_ip' => $this->input->server('REMOTE_ADDR') ,
    			'user_agent' => $this->input->server('HTTP_USER_AGENT') ,
    			'refer_page' => $this->input->server('HTTP_REFERER') ,
    			'log_date' => TIME_YMDHIS ,
    			'url_page' => REFER_PATH ,
    			's_year' => date('Y') ,
    			's_month' => date('m') ,
    			's_day' => date('d') ,
    			's_week' => date('w')
    	);
    	 
    	$this->db->insert('NX_STATSTIC', $data);
    	return true;
    	 
    }
    
    
    function emo_regist_proc($nx_emo_file)
    {
    	
    	$ci_group			= secure($this->input->post('ci_group'));
    	
    	
    	$data = array(
    			'ci_group' => $ci_group ,
    			'ci_filename' => $nx_emo_file
    	);
    	 
    	$this->db->insert('NX_EMOTICON',$data);
    	
    
    	return true;
    
    }
    
    function emo_delete_proc($idx=''){
    	$this->db->where('idx',$idx);
    	$this->db->delete('NX_EMOTICON');
    
    	return true;
    
    
    }
}
?>