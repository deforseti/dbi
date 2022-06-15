<div class="online-get-prod-param">
	<form method="POST">
		<?php
			require_once('form-elem/common_values_inputs.php');
		?>

		<div class="relf_line"></div>
		<p class="title_form_omline">Перекачиваемая жидкость:</p>
		<div class="row">
			<div class="col-lg-4 w_type_w_block">
				<label>Расход макс</label>
				<input 
				data-type="Перекачиваемая жидкость:" 
				data-title="Расход макс"
				data-eqd="<span>л/сек</span>"
				required="required" class="comp_nm" type="number" min="0" value=""><span>л/сек</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Нгеод</label>
				<input 
				data-type="Перекачиваемая жидкость:" 
				data-title="Нгеод"
				data-eqd="<span>м</span>"
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Нполн</label>
				<input 
				data-type="Перекачиваемая жидкость:" 
				data-title="Нполн"
				data-eqd="<span>м</span>"
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4 w_type_w_block">
				<label><strong>Количество насосов:</strong></label>
				<input 
				data-type="Перекачиваемая жидкость:" 
				data-title="Количество насосов:"
				data-eqd="<span>шт</span>"
				required="required" class="comp_nm" type="number" min="0" value=""><span>шт</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Рабочих:</label>
				<input 
				data-type="Перекачиваемая жидкость:" 
				data-title="Рабочих:"
				data-eqd="<span>шт</span>"
				required="required" class="comp_nm" type="number" min="0" value=""><span>шт</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Резервных:</label>
				<input 
				data-type="Перекачиваемая жидкость:" 
				data-title="Резервных:"
				data-eqd="<span>шт</span>"
				required="required" class="comp_nm" type="number" min="0" value=""><span>шт</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-3 w_type_w_block">
				<label class="title_form_omline_mm"><strong>Класс исполнения насосов:</strong></label>
			</div>
			<div class="col-lg-3">
				<label for="df1">Без взрывозащиты <strong>IP67</strong></label>
				<input
				data-type="Класс исполнения насосов:" 
				data-title="Без взрывозащиты <strong>IP67</strong>"
				data-eqd=""
				required="required" id="df1" class="comp_nm" type="radio" name="type_boom_protection" value="">
			</div>
			<div class="col-lg-3">
				<label for="df2">С взрывозащитой <strong>(EEX)</strong></label>
				<input 
				data-type="Класс исполнения насосов:" 
				data-title="С взрывозащитой <strong>(EEX)</strong>"
				data-eqd=""
				required="required" id="df2" class="comp_nm" type="radio" name="type_boom_protection" value="">
			</div>
			<div class="col-lg-3">
				<label for="df3">С рубашкой охлаждения</label>
				<input 
				data-type="Класс исполнения насосов:" 
				data-title="С рубашкой охлаждения"
				data-eqd=""
				required="required" id="df3" class="comp_nm" type="radio" name="type_boom_protection" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4 w_type_w_block">
				<label class="title_form_omline_mm"><strong>Напорный трубопровод:</strong></label>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Длина:</label>
				<input 
				data-type="Напорный трубопровод:" 
				data-title="Длина:"
				data-eqd="<span>м</span>"
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Диаметр:</label>
				<input 
				data-type="Напорный трубопровод:" 
				data-title="Диаметр:"
				data-eqd="<span>мм</span>"
				required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4 w_type_w_block">
				<label class="title_form_omline_mm"><strong>Исполнение щита управления:</strong></label>
			</div>
			<div class="col-lg-4">
				<label for="sw_b1">Внутреннее <strong>(IP 42)</strong></label>
				<input 
				data-type="Исполнение щита управления:" 
				data-title="Внутреннее (IP 42)"
				data-eqd=""
				required="required" id="sw_b1" class="comp_nm" type="radio" name="switchboard_data" value="">
			</div>
			<div class="col-lg-4">
				<label for="sw_b2">Наружное <strong>(IP 55)</strong></label>
				<input
				data-type="Исполнение щита управления:" 
				data-title="Наружное (IP 55)"
				data-eqd=""
				required="required" id="sw_b2" class="comp_nm" type="radio" name="switchboard_data" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4 w_type_w_block">
				<label class="title_form_omline_mm"><strong>Система контроля уровня:</strong></label>
			</div>
			<div class="col-lg-3">
				<label for="sys_lvl1">Поплавковая</label>
				<input 
				data-type="Система контроля уровня:" 
				data-title="Поплавковая"
				data-eqd=""
				required="required" id="sys_lvl1" class="comp_nm" type="radio" name="system_contr_lvl" value="">
			</div>
			<div class="col-lg-3">
				<label for="sys_lvl2">Контроллерная</label>
				<input 
				data-type="Система контроля уровня:" 
				data-title="Поплавковая"
				data-eqd=""
				required="required" id="sys_lvl2" class="comp_nm" type="radio" name="system_contr_lvl" value="">
			</div>
			<div class="col-lg-4">
				
			</div>
			<div class="col-lg-3">
				<label for="sys_lvl3">Один ввод питания</label>
				<input 
				data-type="Система контроля уровня:" 
				data-title="Один ввод питания"
				data-eqd=""
				required="required" id="sys_lvl3" class="comp_nm" type="radio" name="system_contr_lvl" value="">
			</div>
			<div class="col-lg-3">
				<label for="sys_lvl4">Двойной ввод питания</label>
				<input 
				data-type="Система контроля уровня:" 
				data-title="Двойной ввод питания"
				data-eqd=""
				required="required" id="sys_lvl4" class="comp_nm" type="radio" name="system_contr_lvl" value="">
			</div>
			<div class="col-lg-4">
				
			</div>
			<div class="col-lg-3">
				<label for="sys_lvl5">С системой АВР</label>
				<input 
				data-type="Система контроля уровня:" 
				data-title="С системой АВР"
				data-eqd=""
				required="required" id="sys_lvl5" class="comp_nm" type="radio" name="system_contr_lvl" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<label><strong>Длина кабеля</strong></label>
				<input 
				data-type="Система контроля уровня:" 
				data-title="Длина кабеля:"
				data-eqd="<span>м</span>"
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
		</div>

		<p class="title_form_omline">Варианты монтажа:</p>
		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4">
				<label for="m_opt1"><strong>Погружной вертикальный</strong></label>
				<input 
				data-type="Варианты монтажа:" 
				data-title="Погружной вертикальный"
				data-eqd=""
				required="required" id="m_opt1" class="comp_nm" type="radio" name="mounting_options" value="">
			</div>
			<div class="col-lg-4">
				<label for="m_opt2"><strong>Стацыонарный вертикальный</strong></label>
				<input 
				data-type="Варианты монтажа:" 
				data-title="Стацыонарный вертикальный"
				data-eqd=""
				required="required" id="m_opt2" class="comp_nm" type="radio" name="mounting_options" value="">
			</div>
			<div class="col-lg-4">
				<label for="m_opt3"><strong>Переностной погружной</strong></label>
				<input 
				data-type="Варианты монтажа:" 
				data-title="Переностной погружной"
				data-eqd=""
				required="required" id="m_opt3" class="comp_nm" type="radio" name="mounting_options" value="">
			</div>
			<div class="col-lg-4">
				<label for="m_opt4"><strong>Стацыонарный горизонтальный</strong></label>
				<input 
				data-type="Варианты монтажа:" 
				data-title="Стацыонарный горизонтальный"
				data-eqd=""
				required="required" id="m_opt4" class="comp_nm" type="radio" name="mounting_options" value="">
			</div>
			<div class="col-lg-4">
				<label for="m_opt5"><strong>Вертикальный в осадной трубе</strong></label>
				<input 
				data-type="Варианты монтажа:" 
				data-title="Вертикальный в осадной трубе"
				data-eqd=""
				required="required" id="m_opt5" class="comp_nm" type="radio" name="mounting_options" value="">
			</div>
		</div>





		<?php
			require_once('form-elem/submit-button.php');
		?>
		
	</form>
</div>