<?php

namespace Home\Mapper;

final class PartnerMapper implements IMapper {
	public function tranlate(array $rows, $isArray) {
		if (! empty ( $rows )) {
			if ($isArray) {
				foreach ( $rows as $k => $v ) {
					$rows [$k] ['par_logo_http'] = _asset_gn($v ['par_logo']);
					$rows [$k] ['par_protype_txt'] = _getPartypeById ( $v ['par_protype'] );
					$rows [$k] ['par_team_txt'] = _getParTeamById ( $v ['par_team'] );
					$rows [$k] ['par_finance_txt'] = _getParFinanceById ( $v ['par_finance'] );
				}
			} else {
				$rows ['par_logo_http'] = _asset_gn($rows ['par_logo']);
				$rows ['par_protype_txt'] = _getPartypeById ( $rows ['par_protype'] );
				$rows ['par_team_txt'] = _getParTeamById ( $rows ['par_team'] );
				$rows ['par_finance_txt'] = _getParFinanceById ( $rows ['par_finance'] );
			}
		}
		
		return $rows;
	}
}