<div class="online-get-prod-param">
	<form method="POST">
		<?php
			require_once('form-elem/common_values_inputs.php');
		?>

		<div class="relf_line"></div>
		<p class="title_form_omline">Характер шлама</p>
		<div class="row">
			<div class="col-lg-3">
				<p class="sub-title-input"><strong>Требуемый расход смеси</strong></p>
			</div>
			<div class="col-lg-9">
				<input
				required="required" class="comp_nm" type="number" min="0" name="on_adress_project" value=""><span>м<sup>3</sup>/ч</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4">
				<p class="sub-title-input title_form_omline_mm"><strong>Концентрация частиц (по весу)</strong></p>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Обычная:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>%</span>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Макс:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>%</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4">
				<p class="sub-title-input title_form_omline_mm"><strong>Концентрация частиц (по объему)</strong></p>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Обычная:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>%</span>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Макс:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>%</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<p class="title_form_omline">Характеристики смеси</p>
			<div class="w_type_w_block col-lg-3">
				<label>Удельный вес смеси:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>Н/м<sup>3</sup></span>
			</div>
			<div class="w_type_w_block col-lg-3">
				<label>Температура:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span><sup>°</sup>С</span>
			</div>
			<div class="w_type_w_block col-lg-3">
				<label>Вязкость:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м<sup>2</sup>/с</span>
			</div>
			<div class="w_type_w_block col-lg-3">
				<label>Уровень pH:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<p class="title_form_omline">Характер частиц</p>
		<div class="row">
			<div class="w_type_w_block col-lg-6">
				<label>Происхождение частиц:</label>
				<input
				required="required" class="comp_nm onlyText" type="test" value="">
			</div>
			<div class="w_type_w_block col-lg-6">
				<label>Удельный вес сухих частиц:</label>
				<input
				required="required" class="comp_nm" type="text" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<p class="title_form_omline">Размер частиц</p>
		<div class="row">
			<div class="col-lg-12">
				<p><strong>Средний диаметр частиц:</strong></p>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Диаметр решетки, подходящей для 50% частиц 50d:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Диаметр решетки, подходящей для 85% частиц 85:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Диаметр решетки, подходящей для 95% частиц 95:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<p class="title_form_omline">Напор</p>
		<div class="row">
			<div class="w_type_w_block col-lg-6">
				<label>Статический напор:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
			<div class="w_type_w_block col-lg-6">
				<label>Любые высокие точки (выше статического уровня точки излива):</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<p class="title_form_omline">Система трубопроводов</p>
		<div class="row">
			<div class="w_type_w_block col-lg-6">
				<label>Длинна:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
			<div class="w_type_w_block col-lg-6">
				<label>Размер (внутренний диаметр):</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
			</div>
		</div>
		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Тип установки:</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="type_str_ttp1">Полустационарный:</label>
				<input
				id="type_str_ttp1" required="required" class="comp_nm" name="type_str_ttp" type="radio" value="">
			</div>
			<div class="col-lg-4">
				<label for="type_str_ttp2">Переносной:</label>
				<input
				id="type_str_ttp2" required="required" class="comp_nm" name="type_str_ttp" type="radio" value="">
			</div>
			<div class="col-lg-4">
				<label for="type_str_ttp3">Стационарный:</label>
				<input
				id="type_str_ttp3" required="required" class="comp_nm" name="type_str_ttp" type="radio" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="w_type_w_block col-lg-4">
				<label>Угол наклона:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span><sup>°</sup></span>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Высота Z:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Высота Z:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
		</div>
		<div class="row">
			<div class="w_type_w_block col-lg-4">
				<label>Материал:</label>
				<input
				required="required" class="comp_nm" type="text" value="">
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Количество поворотов:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>шт</span>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Количество задвижек:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>шт</span>
			</div>
		</div>


		<?php
			require_once('form-elem/submit-button.php');
		?>
	</form>
</div>