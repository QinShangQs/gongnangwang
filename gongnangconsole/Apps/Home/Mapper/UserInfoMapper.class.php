<?php

namespace Home\Mapper;

final class UserInfoMapper implements IMapper {
	public function tranlate(array $rows, $isArray) {
		if (! empty ( $rows )) {
			if ($isArray) {
				foreach ( $rows as $k => $v ) {
					$rows [$k] ['photo_http'] = _asset_gn ( $v ['photo'] );
					$rows [$k] ['resume_http'] = _asset_gn ( $v ['resume'] );
					
					$rows [$k] ['age_txt'] = _getUserAgeById ( $v ['age'] );
					$rows [$k] ['identity_txt'] = _getUserIndentityById ( $v ['identity'] );
					$rows [$k] ['worklife_txt'] = _getUserWorkById ( $v ['worklife'] );
				}
			} else {
				$rows ['photo_http'] = _asset_gn ( $rows ['photo'] );
				$rows ['resume_http'] = _asset_gn ( $rows ['resume'] );
				
				$rows ['age_txt'] = _getUserAgeById ( $rows ['age'] );
				$rows ['identity_txt'] = _getUserIndentityById ( $rows ['identity'] );
				$rows ['worklife_txt'] = _getUserWorkById ( $rows ['worklife'] );
			}
		}
		
		return $rows;
	}
}