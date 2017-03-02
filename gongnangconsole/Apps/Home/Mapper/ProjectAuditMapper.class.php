<?php

namespace Home\Mapper;

final class ProjectAuditMapper implements IMapper {
	public function tranlate(array $rows, $isArray) {
		if (! empty ( $rows )) {
			if ($isArray) {
				foreach ( $rows as $k => $v ) {
					$rows [$k] ['old_publish_status_txt'] = _getProPublishStatusById ( $v ['old_publish_status'] );
					$rows [$k] ['new_publish_status_txt'] = _getProPublishStatusById ( $v ['new_publish_status'] );
				}
			} else {
				$rows ['old_publish_status_txt'] = _getProPublishStatusById ( $rows ['old_publish_status'] );
				$rows ['new_publish_status_txt'] = _getProPublishStatusById ( $rows ['new_publish_status'] );
			}
		}
		
		return $rows;
	}
}