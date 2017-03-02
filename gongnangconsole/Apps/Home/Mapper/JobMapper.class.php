<?php

namespace Home\Mapper;

final class JobMapper implements IMapper {
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
			}
		}
		
		return $rows;
	}
}