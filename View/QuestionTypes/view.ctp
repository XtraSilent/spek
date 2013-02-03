<?php
debug($occurences);
?>

<div id="mc-title">
	<h1> View JSU </h1>
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-back">
			<?php echo $this->Html->link(__('Back'), array(
														'controller' => 'courses', 
														'action' => 'view',
														$this->passedArgs[0]
														));
			?>
			</li>
			<li class="button" id="toolbar-add">
			<?php echo $this->Html->link(__('Add'), array(
														'controller' => 'questionTypes', 
														'action' => 'add',
														$this->passedArgs[0]
														));
			?>
			</li>

		</ul>
	</div>
	<div class="mc-clr"></div>
</div>

<div id="mc-component">
<div class="mc-clr"></div>
<h1> Distribution of question types </h1>

<table class="adminlist">
<thead>
<tr>
	<th rowspan=2> CHAPTER </th>
	<th rowspan=2> PLO </th>
	<th rowspan=2> CLO </th>
	<th rowspan=2> TYPES </th>
	<th rowspan=2> TIME(SLT) </th>
	<th rowspan=2> TIME (%) </th>
	<th rowspan=2> MARKS (%) </th>
	<th colspan=6> COGNITIVE </th>
	<th colspan=5> AFFECTIVE </th>
	<th colspan=7> PSYCHOMOTOR </th>
</tr>
<tr>
	<th> C1 </th>
	<th> C2 </th>
	<th> C3 </th>
	<th> C4 </th>
	<th> C5 </th>
	<th> C6 </th>
	<th> A1 </th>
	<th> A2 </th>
	<th> A3 </th>
	<th> A4 </th>
	<th> A5 </th>
	<th> P1 </th>
	<th> P2 </th>
	<th> P3 </th>
	<th> P4 </th>
	<th> P5 </th>
	<th> P6 </th>
	<th> P7 </th>	
</tr>
</thead>
<tbody>
	<?php
		$all_slt = 0;
		$total_marks = 0;

		foreach($questionTypes as $questionType):	
			foreach($questionType['Content']['Slt'] as $slt):
					$all_slt += $slt['f2f'];
			endforeach;

			$total_marks += $questionType['QuestionType']['marks'];
		endforeach;


		foreach($questionTypes as $questionType): 	
			$total_slt = 0;
			$current_content_id = $questionType['Content']['id'];
	?>
	<tr>
		<td> <?php echo $questionType['Content']['description']; ?> </td>

		<?php
			foreach($questionType['Content']['Outcome'] as $content):
				echo "<td>";
				foreach($content['Po'] as $po):
						echo $po['description'] . "<br><br>";
				endforeach;				
				echo "</td>";
			endforeach;

			echo "<td>";				
			foreach($questionType['Content']['Outcome'] as $content):
				echo $content['description'] . "<br><br>";
			endforeach;
			echo "</td>";

			echo "<td>";				
				echo $questionType['QuestionType']['type'];
			echo "</td>";			

			echo "<td>";
			foreach($questionType['Content']['Slt'] as $slt):
					$total_slt += $slt['f2f'];
			endforeach;
			echo $total_slt;
			echo "</td>";

		?>
		<td> <?php echo number_format($total_slt/$all_slt * 100,1); ?> </td>
		<td> <?php echo number_format($questionType['QuestionType']['marks']/$total_marks * 100,1); ?> </td>		
		<?php
			for($i=1; $i<=6; $i++) {
				echo '<td>';
					if($questionType['QuestionType']['cognitive'] == $i)
						echo '<strong> / </strong>';
						// echo $questionType['QuestionType']['type'];
				echo '</td>';
			}

			for($i=1; $i<=5; $i++) {
				echo '<td>';
					if($questionType['QuestionType']['affective'] == $i)
						echo '<strong> / </strong>';						
						// echo $questionType['QuestionType']['type'];
				echo '</td>';
			}

			for($i=1; $i<=7; $i++) {
				echo '<td>';
					if($questionType['QuestionType']['psychomotor'] == $i)
						echo '<strong> / </strong>';						
						// echo $questionType['QuestionType']['type'];
				echo '</td>';
			}
		?>		
	</tr>
	<?php
	endforeach;
	?>
</tbody>
</table>
</div>

<div id="mc-component">
<div class="mc-clr"></div>
<h1> Distribution of marks </h1>

<table class="adminlist">
<thead>
<tr>
	<th rowspan=2> CHAPTER </th>
	<th rowspan=2> PLO </th>
	<th rowspan=2> CLO </th>
	<th rowspan=2> TIME(SLT) </th>
	<th rowspan=2> TIME (%) </th>
	<th rowspan=2> MARKS (%) </th>
	<th colspan=6> COGNITIVE </th>
	<th colspan=5> AFFECTIVE </th>
	<th colspan=7> PSYCHOMOTOR </th>
</tr>
<tr>
	<th> C1 </th>
	<th> C2 </th>
	<th> C3 </th>
	<th> C4 </th>
	<th> C5 </th>
	<th> C6 </th>
	<th> A1 </th>
	<th> A2 </th>
	<th> A3 </th>
	<th> A4 </th>
	<th> A5 </th>
	<th> P1 </th>
	<th> P2 </th>
	<th> P3 </th>
	<th> P4 </th>
	<th> P5 </th>
	<th> P6 </th>
	<th> P7 </th>	
</tr>
</thead>
<tbody>
	<?php
		foreach ($questionTypes as $questionType): 	
	?>
	<tr>
		<td> <?php echo $questionType['Content']['description']; ?> </td>
		<td> <?php echo $questionType['Content']['Outcome']['0']['Po']['0']['description']; ?> </td>
		<td> <?php echo $questionType['Content']['Outcome']['0']['description']; ?> </td>
		<td> <?php // echo $questionType['Slt']['f2f']; ?> </td>		
		<td> <?php echo $questionType['QuestionType']['time']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['marks']; ?> </td>		
		<td> <?php echo $questionType['QuestionType']['C1']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['C2']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['C3']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['C4']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['C5']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['C6']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['A1']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['A2']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['A3']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['A4']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['A5']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['P1']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['P2']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['P3']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['P4']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['P5']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['P6']; ?> </td>
		<td> <?php echo $questionType['QuestionType']['P7']; ?> </td>		
	</tr>
	<?php
	endforeach;
	?>
</tbody>
</table>
</div>
</br>