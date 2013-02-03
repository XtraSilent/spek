<?php
// debug($program);
?>

<div id="mc-title">
	<h1> Program Overview </h1>

	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button special" id="toolbar-back">

			<?php echo $this->Html->link(__('Back'), array(
													'controller' => 'programs', 
													'action' => 'index'
													));
			?>
			</li>
			
			<li class="button special" id="toolbar-popeo">
			<?php echo $this->Html->link(__('PLO-PEO'), array(
													'controller' => 'pos', 
													'action' => 'popeo',
													$program['Program']['id']
													));
			?>
			</li>

			<li class="button special" id="toolbar-poloki">
			<?php echo $this->Html->link(__('PLO-LOKI'), array(
													'controller' => 'pos', 
													'action' => 'poloki',
													$program['Program']['id']
													));
			?>
			</li>

			<li class="divider">
			</li>

			<?php
			if($this->Session->read('Auth.User.group_id') == 1) {
			?>

			<li class="button" id="toolbar-edit">
			<a href="/uhek/programs/edit/<?php echo $program['Program']['id'];?>" class="toolbar">
			Edit
			</a>
			</li>

			<li class="button" id="toolbar-delete">
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $program['Program']['id']), null, __('Are you sure you want to delete # %s?', $program['Program']['id'])); ?>
			</li>

			<?php
			}
			?>
		</ul>
	</div>						

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
<div class="mc-clr"></div>

<table>
<tr>
		<td><strong><?php echo __('Program Code'); ?> </strong></td>
		<td> :
			<?php echo h($program['Program']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('Name (English)'); ?></strong></td>
		<td> :
			<?php echo  h( strtoupper($program['Program']['name_be']) ); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('Name (Malay)'); ?></strong></td>
		<td> :
			<?php echo h( strtoupper( $program['Program']['name_bm']) ); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('Faculty'); ?></strong></td>
		<td> :
			<?php echo h( strtoupper( $program['Faculty']['name']) ); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('Level'); ?></strong></td>
		<td> :
			<?php echo h( strtoupper( $program['Level']['name']) ); ?>
			&nbsp;
		</td>
</tr>
</table>
<br />

<h3><?php echo __('Program Educational Objectives (PEO)');?></h3>
<?php if (!empty($program['Peo'])):?>
<table class="adminlist">
<thead>
<tr>
	<th><?php echo __('Objectives'); ?></th>

	<?php
	if($this->Session->read('Auth.User.group_id') == 1) {
	?>
	
	<th class="actions">&nbsp;</th>

	<?php
	}
	?>

</tr>
</thead>
<tbody>
<?php
	$i = 1;
	foreach ($program['Peo'] as $peo): ?>
	<tr>
		<td><?php echo $i . ". " . $peo['description'];?></td>

		<?php
		if($this->Session->read('Auth.User.group_id') == 1) {
		?>

		<td class="actions">
			<?php
			  echo $this->Html->link(__('Edit '), array('controller' => 'peos', 'action' => 'edit', $peo['id'] ));				
			  echo $this->Form->postLink(__(': Delete'), array('controller' => 'peos', 'action' => 'delete', $peo['id'],'?' => array('program_id'=>$this->params['pass']['0'])), null, __('Are you sure you want to delete # %s?', $peo['id'])); 
			?>
		</td>

		<?php
		}
		?>

	</tr>
<?php 
$i++;
endforeach; 
?>
</tbody>
</table>
<?php endif; ?>

<?php
if($this->Session->read('Auth.User.group_id') == 1) {
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
		<?php echo $this->Html->link(__('Add New Program Objectives'), array('controller' => 'peos', 'action' => 'add', '?' => array('program_id'=>$this->params['pass']['0'])));?> 
	</li>
</ul>
</div>
<div class="mc-clr"></div>

<?php
}
?>

<br />

	<h3><?php echo __('Program Learning Outcome (PLO)');?></h3>
	<?php if (!empty($program['Po'])):?>
	<table class="adminlist">
	<thead>
	<tr>
		<th><?php echo __('Outcomes'); ?></th>

	<?php
	if($this->Session->read('Auth.User.group_id') == 1) {
	?>		
	
	<th class="actions">&nbsp;</th>
	
	<?php
	}
	?>

	</tr>
	</thead>
	<tbody>
	<?php
		$i = 1;
		foreach ($program['Po'] as $po): ?>
		<tr>
			<td><?php echo $i . ". " . $po['description'];?></td>

		<?php
		if($this->Session->read('Auth.User.group_id') == 1) {
		?>			

			<td class="actions">
				<?php
				  echo $this->Html->link(__('Edit '), array('controller' => 'pos', 'action' => 'edit', $po['id'],
				  	'?' => array('program_id'=>$this->params['pass']['0'])
				  	));				
				  echo $this->Form->postLink(__(' : Delete'), array('controller' => 'pos', 'action' => 'delete', $po['id'],'?' => array('program_id'=>$this->params['pass']['0'])), null, __('Are you sure you want to delete # %s?', $po['id'])); 
				?>
			</td>

		<?php
		}
		?>

		</tr>
	<?php 
	$i++;
	endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

<?php
if($this->Session->read('Auth.User.group_id') == 1) {
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
		<?php echo $this->Html->link(__('Add New Program Outcome'), array('controller' => 'pos', 'action' => 'add', '?' => array('program_id'=>$this->params['pass']['0'])));?>
	</li>
</ul>
</div>

<div class="mc-clr"></div>

<?php
}
?>

<br />


	<h3><?php echo __('List of Courses');?></h3>
	<?php if (!empty($program['Course'])):?>
	<?php
		$i = 0;
		$semester = 0; 
		foreach ($program['Course'] as $course):

		if($semester != 0 && $course['semester'] != $semester) {
			echo "</tbody>";
			echo "</table>";
		}

		if($course['semester'] != $semester) {
		$semester = $course['semester'];

		echo "<h3> Semester " . $semester . "</h3>"; 
		?>

		<table class="adminlist">
		<thead>
		<tr>
			<th><?php echo __('Code'); ?></th>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Resource Person'); ?></th>
		</tr>
		</thead>
		<tbody>

		<?php
		}
		?>

		<tr>
			<td  width="10%"><?php echo $this->Html->link($course['id'], array('controller' => 'courses', 'action' => 'view', $course['id'])); 
				?>
			</td>
			<td><?php echo $course['name'];?></td>
			<td><?php echo $course['user_id']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

<?php
if($this->Session->read('Auth.User.group_id') == 1) {
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
	<?php echo $this->Html->link(__('Add New Course'), array('controller' => 'courses', 'action' => 'add', 
							  '?' => array('program_id'=>$this->params['pass']['0'])
							  )
				);
				?>
		</li>
	</ul>
</div>

<?php
}
?>

</div> <!-- mc-component -->
<br />
<br />