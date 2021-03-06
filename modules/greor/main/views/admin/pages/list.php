<?php defined('SYSPATH') or die('No direct access allowed.'); 

	if ( ! empty($pages)): 
		
		require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php';
	
		$tpl_array = array(
			'down_tpl' => HTML::anchor(Route::url('admin', array(
				'controller' => 'pages',
				'action' => 'position',
				'id' => '--ID--',
				'query' => 'mode=down',
			)), '<i class="icon-arrow-down"></i>', array(
				'class' => 'btn down_button',
				'title' => __('Move down'),
			)),
			'up_tpl' => HTML::anchor(Route::url('admin', array(
				'controller' => 'pages',
				'action' => 'position',
				'id' => '--ID--',
				'query' => 'mode=up',
			)), '<i class="icon-arrow-up"></i>', array(
				'class' => 'btn up_button',
				'title' => __('Move up'),
			)),
			'edit_tpl' => HTML::anchor(Route::url('admin', array(
				'controller' => 'pages',
				'action' => 'edit',
				'id' => '--ID--',
			)), '<i class="icon-edit"></i>', array(
				'class' => 'btn edit_button',
				'title' => __('Edit'),
			)),
			'delete_tpl' => HTML::anchor(Route::url('admin', array(
				'controller' => 'pages',
				'action' => 'delete',
				'id' => '--ID--',
			)), '<i class="icon-remove"></i>', array(
				'class' => 'btn delete_button',
				'title' => __('Delete'),
			)),
			'visibility_tpl' => HTML::anchor(Route::url('admin', array(
				'controller' => 'pages',
				'action' => 'element_visibility',
				'id' => '--ID--',
				'query' => 'mode=--mode--',
			)), '<i class="--icon-class--"></i>', array(
				'class' => 'btn hide_button',
				'title' => '--TITLE--',
			)),
		);
		
		$page_config = Kohana::$config->load('_pages');
		$reference = array(
			'ACL' => $ACL,
			'USER' => $USER,
			'modules' => $modules,
			'base_uri_list' => $base_uri_list,
			'status_codes' => $page_config->get('status_codes'),
			'page_types' => $page_config->get('type'),
			'tpl_array' => $tpl_array,
			'hided_list' => $hided_list,
			'query_region' => ($SITE['type'] == 'master' ? '' : '?region='.$SITE['code']),
		);
		
		$tpl = '<li{ATTR}>
					{STATUS_ICONS}
					<div class="action">{ACTIONS}</div>
					<div>
						{TITLE}
						[&nbsp;<span class="desription">{LINK}</span>&nbsp;]
						<span class="desription">&#60;{DESCRIPTION}&#62;</span>
					</div>
					{CHILDRENS}
				</li>';
		
		echo draw_sub($pages, $reference, $tpl, FALSE);
	
	endif;
