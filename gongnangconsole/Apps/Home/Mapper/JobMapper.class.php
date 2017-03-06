<?php

namespace Home\Mapper;

use Home\Logic\PartnerLogic;
use Home\Logic\VJobDeliversLogic;
final class JobMapper implements IMapper {
	private $_partnerLogic = null;
	private $_vJobDeliversLogic = null;
	public function __construct(){
		$this->_partnerLogic = new PartnerLogic(null);
		$this->_vJobDeliversLogic = new VJobDeliversLogic(null);
	}
	
	public function tranlate(array $rows, $isArray) {
	
		if (! empty ( $rows )) {
			if ($isArray) {
				foreach ( $rows as $k => $v ) {
					$rows [$k] ['par_work_txt'] = _getParWorkById ( $v ['par_work'] );
					$rows [$k] ['par_education_txt'] = _getParEducationById ( $v ['par_education'] );
					$rows [$k] ['par_age_txt'] = _getParAgeById ( $v ['par_age'] );
					$rows [$k] ['par_mode_txt'] = _getParModeById ( $v ['par_mode'] );
					$rows [$k] ['par_pay_type_txt'] = _getParPayTypeById ( $v ['par_pay_type'] );
					$rows [$k] ['par_return_type_txt'] = _getParReturnTypeById ( $v ['par_return_type'] );
					$rows [$k] ['line_status_txt'] = _getParLineStatusById ( $v ['line_status'] );
					$rows [$k] ['publish_status_txt'] = _getParPublishStatusById ( $v ['publish_status'] );
					
					$rows [$k] ['par_proname'] = $this->getParProName($v ['par_id'] );
					$rows [$k] ['deliver_count'] = $this->getDeliverCount($v ['id']);
				}
			} else {
				$rows ['par_work_txt'] = _getParWorkById ( $rows ['par_work'] );
				$rows ['par_education_txt'] = _getParEducationById ( $rows ['par_education'] );
				$rows ['par_age_txt'] = _getParAgeById ( $rows ['par_age'] );
				$rows ['par_mode_txt'] = _getParModeById ( $rows ['par_mode'] );
				$rows ['par_pay_type_txt'] = _getParPayTypeById ( $rows ['par_pay_type'] );
				$rows ['par_return_type_txt'] = _getParReturnTypeById ( $rows ['par_return_type'] );
				$rows ['line_status_txt'] = _getParLineStatusById ( $rows ['line_status'] );
				$rows ['publish_status_txt'] = _getParPublishStatusById ( $rows ['publish_status'] );
				
				$rows ['par_proname'] = $this->getParProName($rows ['par_id'] );
				$rows ['deliver_count'] = $this->getDeliverCount($rows ['id']);
			}
		}
		
		return $rows;
	}
	
	private function getParProName($par_id){
		$fields = "par_proname";
		$conditions = array(array('id'=> array('eq', $par_id)));
		$result = $this->_partnerLogic->getFieldsBy($fields,$conditions, 1);
		if(isset($result[0])){
			return $result[0]['par_proname'];
		}
		return '';
	}
	
	private function getDeliverCount($extend_id){
		$count = $this->_vJobDeliversLogic->countByProperty('extend_id', $extend_id);
		return $count;
	}
}