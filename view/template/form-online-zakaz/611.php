<div class="online-get-prod-param">
	<form method="POST">
		<?php
			require_once('form-elem/common_values_inputs.php');
		?>

		<div class="relf_line"></div>
		<p class="title_form_omline">Основные данные для выбора оборудования</p>
		
		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p><strong>Применение</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="air_filtr_df1">КНС</label>
				<input
				required="required" id="air_filtr_df1" class="comp_nm" type="radio" name="air_filtr_df" value="">
			</div>
			<div class="col-lg-4">
				<label for="air_filtr_df2">Шахты</label>
				<input
				required="required" id="air_filtr_df2" class="comp_nm" type="radio" name="air_filtr_df" value="">
			</div>
			<div class="col-lg-4">
				<label for="air_filtr_df3">Колодцы</label>
				<input
				required="required" id="air_filtr_df3" class="comp_nm" type="radio" name="air_filtr_df" value="">
			</div>
			<div class="col-lg-4">
				<label for="air_filtr_df4">Очисные сооружения</label>
				<input
				required="required" id="air_filtr_df4" class="comp_nm" type="radio" name="air_filtr_df" value="">
			</div>
			<div class="col-lg-4">
				<label for="air_filtr_df5">Коллектора (трубы)</label>
				<input
				required="required" id="air_filtr_df5" class="comp_nm" type="radio" name="air_filtr_df" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-6">
				<label for="type_ventil_dfr1">Принудительная вентиляция</label>
				<input
				required="required" id="type_ventil_dfr1" class="comp_nm" type="radio" name="type_ventil_dfr" value="">
			</div>
			<div class="col-lg-6">
				<label for="type_ventil_dfr2">Естественная вентиляция</label>
				<input
				required="required" id="type_ventil_dfr2" class="comp_nm" type="radio" name="type_ventil_dfr" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">	
			<div class="col-lg-6 w_type_w_block">
				<label>Количество вентеляционных каналов</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>шт</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Скорость потока воздуха (газов) в вентканале на очистку</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м/с</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Динамический обьем воздуха (газов) в системе max</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м<sup>3</sup>/ч</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Статический обьем воздуха (газов) в системе max.</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м<sup>3</sup>/ч</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Тип подключения фильтра WAGER (США)</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 w_type_w_block">
				<label>Фланец Ду</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value="">
			</div>
			<div class="col-lg-3 w_type_w_block">
				<label>Ру</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>атм</span>
			</div>
			<div class="col-lg-3 w_type_w_block">
				<label>Резьба Ду</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value="">
			</div>
			<div class="col-lg-3 w_type_w_block">
				<label>Ру</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>атм</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Вид подключения фильтра WAGER (США)</strong></p>
			</div>
			<div class="col-lg-6">
				<label for="ty_conn_flanss1">Горизонтальное</label>
				<input
				required="required" id="ty_conn_flanss1" class="comp_nm" type="radio" name="ty_conn_flanss" value="">
			</div>
			<div class="col-lg-6">
				<label for="ty_conn_flanss2">Вертикальное</label>
				<input
				required="required" id="ty_conn_flanss2" class="comp_nm" type="radio" name="ty_conn_flanss" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Характеристики сточных вод</strong></p>
			</div>
			<div class="col-lg-3">
				<label for="type_prom_eter1">Хоз-бытовые</label>
				<input
				required="required" id="type_prom_eter1" class="comp_nm" type="radio" name="type_prom_eter" value="">
			</div>
			<div class="col-lg-3">
				<label for="type_prom_eter2">Промышленные</label>
				<input
				required="required" id="type_prom_eter2" class="comp_nm" type="radio" name="type_prom_eter" value="">
			</div>
			<div class="col-lg-3">
				<label for="type_prom_eter3">Ливневые</label>
				<input
				required="required" id="type_prom_eter3" class="comp_nm" type="radio" name="type_prom_eter" value="">
			</div>
			<div class="col-lg-3">
				<label for="type_prom_eter4">Сельскохозяйственные</label>
				<input
				required="required" id="type_prom_eter4" class="comp_nm" type="radio" name="type_prom_eter" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Характеристики воздуха (газов) на очистку</strong></p>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Максимальная температура воздуха (газов)</label>
				<input
				required="required" class="comp_nm maxVO" type="number" min="0" value=""><span><sup>°</sup>C</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Минимальная температура воздуха (газов)</label>
				<input
				required="required" class="comp_nm minVO" type="number" min="0" value=""><span><sup>°</sup>C</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Влажность воздуха (газов)</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>%</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row oneInputRequired">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Концентрация воздуха (газов)</strong></p>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Сероводород (H<sub>2</sub>S) (Минимальная суточная разовая концентрация)</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мг/м<sup>3</sup></span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Оксид углерода (СО<sub>2</sub>) (Минимальная суточная разовая концентрация)</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мг/м<sup>3</sup></span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Диоксид азота (NО<sub>2</sub>) (Минимальная суточная разовая концентрация)</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мг/м<sup>3</sup></span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Мeтантиол (CH<sub>4</sub>S) (Минимальная суточная разовая концентрация)</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мг/м<sup>3</sup></span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Этил Меркаптан (C<sub>2</sub>H<sub>6</sub>S) (Минимальная суточная разовая концентрация)</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мг/м<sup>3</sup></span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Аммиак (NH<sub>3</sub>) (Минимальная суточная разовая концентрация)</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мг/м<sup>3</sup></span>
			</div>
			<div class="col-lg-12 w_type_w_block">
				<label>Ваш вариант (Минимальная суточная разовая концентрация)</label>
				<textarea
				class="comp_nm"></textarea>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Характеристики окружающей среды</strong></p>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Влажность воздуха max</label>
				<input
				required="required" class="comp_nm oxyMax" type="number" min="0" value=""><span>%</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Влажность воздуха min</label>
				<input
				required="required" class="comp_nm oxyMin" type="number" min="0" value=""><span>%</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Максимальная температура воздуха</label>
				<input
				required="required" class="comp_nm tMax" type="number" min="0" value=""><span><sup>°</sup>C</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Минимальная температура воздуха</label>
				<input
				required="required" class="comp_nm tMin" type="number" min="0" value=""><span><sup>°</sup>C</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Скороcть ветра на площадке составляет</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м/с</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>Среднегодовая скорость ветра составляет</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м/с</span>
			</div>
		</div>


		<?php
			require_once('form-elem/submit-button.php');
		?>
	</form>
</div>