<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="page-header">	
	<?if ($controller->allowed_crud_action('create')):?>
	<a class="btn btn-primary pull-right ajax-load" href="<?=Route::url($route, array('controller'=> Request::current()->controller(), 'action'=>'create')) ?>" title="<?=__('New')?>">
		<i class="glyphicon glyphicon-pencil"></i>
		<?=__('New')?>
	</a>				
	<?endif?>

	<h1><?=ucfirst(__($name))?></h1>
	<?if($name == 'role'):?><p><a href="http://docs.yclas.com/roles-work-classified-ads-script/" target="_blank"><?=__('Read more')?></a></p><?endif;?>
</div>

<?if($name == "user") :?>
	<form class="form-horizontal" role="form" method="get" action="<?=URL::current();?>">
		<div class="form-group has-feedback">
			<label class="sr-only" for="search"><?=__('Search')?></label>
			<div class="col-md-4 col-md-offset-8">
				<input type="text" class="form-control search-query" name="search" placeholder="<?=__('Search users by name or email')?>" value="<?=core::get('search')?>">
				<span class="glyphicon glyphicon-search form-control-feedback"></span>
			</div>
		</div>
	</form>
<?endif?>

<div class="panel panel-default">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<th><?=__('Title')?></th>
					<th><?=__('Created')?></th>
					<th><?=__('Active')?></th>
					<th></th>
				</thead>
				<tbody>
					<?foreach ($elements as $content):?>
						<?if(isset($content->title)):?>
							<tr id="tr<?=$content->id_post?>">
								<td>
									<p><?=$content->title?></p>
									<p>
										<?if ($content->status==1):?>
											<a title="<?=HTML::chars($content->title)?>" href="<?=Route::url('blog', array('seotitle'=>$content->seotitle))?>">
												<?=Route::url('blog', array('seotitle'=>$content->seotitle))?>
											</a>
										<?else:?>
											<?=Route::url('blog', array('seotitle'=>$content->seotitle))?>
										<?endif?>
									</p>
								</td>
								<td><?=$content->created?></td>
								<td><?=($content->status==1)?__('Yes'):__('No')?></td>
								<td width="5%">
									
									<a class="btn btn-primary ajax-load" 
										href="<?=Route::url($route, array('controller'=> Request::current()->controller(), 'action'=>'update','id'=>$content->pk()))?>" 
										rel="tooltip" title="<?=__('Edit')?>">
										<i class="glyphicon   glyphicon-edit"></i>
									</a>
									<a 
										href="<?=Route::url($route, array('controller'=> Request::current()->controller(), 'action'=>'delete','id'=>$content->pk()))?>" 
										class="btn btn-danger index-delete" 
										title="<?=__('Are you sure you want to delete?')?>" 
										data-id="tr<?=$content->id_post?>" 
										data-btnOkLabel="<?=__('Yes, definitely!')?>" 
										data-btnCancelLabel="<?=__('No way!')?>">
										<i class="glyphicon glyphicon-trash"></i>
									</a>
									
								</td>
							</tr>
						<?endif?>
					<?endforeach?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="text-center"><?=$pagination?></div>