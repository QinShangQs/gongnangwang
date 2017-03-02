<?php

namespace Home\Mapper;

final class PartnerJobAuditMapper implements IMapper {
	public function tranlate(array $rows, $isArray) {
		if (! empty ( $rows )) {
			if ($isArray) {
				foreach ( $rows as $k => $v ) {
					$rows [$k] ['old_publish_status_txt'] = _getParPublishStatusById ( $v ['old_publish_status'] );
					$rows [$k] ['new_publish_status_txt'] = _getParPublishStatusById ( $v ['new_publish_status'] );
				}
			} else {
				$rows ['old_publish_status_txt'] = _getParPublishStatusById ( $rows ['old_publish_status'] );
				$rows ['new_publish_status_txt'] = _getParPublishStatusById ( $rows ['new_publish_status'] );
			}
		}
		
		return $rows;
	}
}