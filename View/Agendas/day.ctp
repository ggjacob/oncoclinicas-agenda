
<div id="page-container" class="row">


	
	<div id="page-content" class="col-sm-9">

		<div class="agendas index">
		
            <div class="header-agenda-day" >
                <div class="calendar">
                    <input type="hidden" id="datepicker" />
                </div>
                <div class="date-agenda">
                    <span class="data-selected" ></span>
                </div>
                <div class="agenda-views-select">
                    <span class="agenda-view selected">DIA</span>
                </div>
            </div>

			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-condensed">
					<thead>
						<tr>
                            <th class="header-cal-day"><?php echo "Todo o Dia" ?></th>
                            <th class="subject-day"><?php  ?></th>
						</tr>
					</thead>
					
					<tbody>
						<?php

                            $hour = 0;

                            for ($count = 0; $count < $lines; $count++){ ?>
                                <?php
                                if($count % 4 == 0){
                                    if($count > 0){
                                        $hour++;
                                    }
                                }
                                ?>
                                <tr class="date-line-selected" id="<?php echo $hours[$hour] . $minutes[$count%4] ?>" >
                                    <td class="header-cal-day" data-time="<?php echo $hours[$hour] . ":" . $minutes[$count%4] ?>"><?php
                                        if($count % 4 == 0){
                                            echo $hours[$hour] . ":" . $minutes[$count%4];
                                        }
                                    ?>&nbsp;</td>
                                    <td class="subject-day"><?php ?></td>
                                </tr>
                        <?php } ?>
					</tbody>
				
				</table>
			</div><!-- /.table-responsive -->
			
			

			<!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->
	<?php echo $this->element('modal/add_appointment'); ?>
    <?php echo $this->element('modal/busy_appointment'); ?>
    <?php echo $this->element('modal/success_appointment'); ?>
    <?php echo $this->element('modal/error_appointment'); ?>

</div><!-- /#page-container .row-fluid -->
