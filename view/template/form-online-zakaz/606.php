<div class="online-get-prod-param">
	<form method="POST">
		<?php
			require_once('form-elem/common_values_inputs.php');
		?>
		<div class="wrapp-to-find-inputs">
		<div class="relf_line"></div>
		<p class="title_form_omline">Основные данные для выбора оборудования</p>
		<div class="row">
			<div class="col-lg-4">
				<p class="sub-title-input">Средний расход сточных вод</p>
			</div>
			<div class="col-lg-4">
				<input
					required="required" class="comp_nm" min="0" type="number" name="fm_m3h" value=""><span>м<sup>3</sup>/час</span>
			</div>
			<div class="col-lg-4">
				<input
					required="required" class="comp_nm" min="0" type="number" name="fm_lh" value=""><span>л/час</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<p class="title_form_omline">Характеристика сточных вод</p>
		<!-- <p class="sub-title-input text-center style-mrg">Сделайте ваш выбор:</p> -->
		<div class="row">
			<div class="col-lg-4">
				<label for="df1">Хоз-бытовые</label>
				<input
					required="required" id="df1" class="comp_nm" type="radio" name="fm_h_water_stock" value="">
			</div>
			<div class="col-lg-4">
				<label for="df2">Промышленные стоки</label>
				<input
					required="required" id="df2" class="comp_nm" type="radio" name="fm_h_water_stock" value="">
			</div>
			<div class="col-lg-4">
				<label for="df3">Ливневые</label>
				<input
					required="required" id="df3" class="comp_nm" type="radio" name="fm_h_water_stock" value="">
			</div>
		</div>

		<div class="row">
			<div class="col-lg-3">
				<p class="sub-title-input">Содержание твердых частиц</p>
			</div>
			<div class="col-lg-9">
				<input
					required="required" class="comp_nm" type="number" min="1" name="fm_t_chast" value=""><span>кг/м<sup>3</sup></span>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<p class="sub-title-input">Размер твердых частиц</p>
			</div>
			<div class="col-lg-9">
				<input
					required="required" class="comp_nm" type="number" min="1" name="fm_t_chast_w_h" value=""><span>мм</span>
			</div>
		</div>

		<p class="title_form_omline">Выберите тип установки</p>
		<div class="row columRadioWrapper">
			<div class="col-lg-4">
				<label for="tr1">Для открытых каналов</label>
				<input
					required="required" id="tr1" class="comp_nm" type="radio" name="fm_type_ustan" value="">
				<div>
					<div class="col-lg-12">
						<p class="sub-title-input">Ширина</p>
					</div>
					<div class="col-lg-12">
						<input
							required="required" class="comp_nm" type="number" name="fm_t_w_ustan" value=""><span>мм</span>
					</div>
					<div class="col-lg-12">
						<p class="sub-title-input">Грубина</p>
					</div>
					<div class="col-lg-12">
						<input
							required="required" class="comp_nm" type="number" name="fm_t_h_ustan" value=""><span>мм</span>
					</div>
					<div class="col-lg-12">
						<p class="sub-title-input">Уровень жидкости в канале</p>
					</div>
					<div class="col-lg-12">
						<input							
						required="required" class="comp_nm" type="number" name="fm_t_h_ustan_water" value=""><span>мм</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 bord-lft">
				<label for="tr2">В КНС на раме</label>
				<input
					required="required" id="tr2" class="comp_nm" type="radio" name="fm_type_ustan" value="">
				<div>
					<div class="col-lg-12">
						<p class="sub-title-input">Диаметр подводящего трубопровода</p>
					</div>
					<div class="col-lg-12">
						<input
							required="required" class="comp_nm" type="number" name="fm_t_w_ustan" value=""><span>мм</span>
					</div>
					<div class="col-lg-12">
						<p class="sub-title-input">Давление</p>
					</div>
					<div class="col-lg-12">
						<input
							required="required" class="comp_nm" type="number" name="fm_t_h_ustan" value=""><span>бар</span>
					</div>
					<div class="col-lg-12">
						<p class="sub-title-input">Максимальное наполнение</p>
					</div>
					<div class="col-lg-12">
						<input
							required="required" class="comp_nm" type="number" name="fm_t_h_ustan_water" value=""><span>мм</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<label for="tr3">Фланцевое</label>
				<input
					required="required" id="tr3" class="comp_nm" type="radio" name="fm_type_ustan" value="">
				<div>
					<div class="col-lg-12">
						<p class="sub-title-input">Диаметр подводящего трубопровода</p>
					</div>
					<div class="col-lg-12">
						<input
							required="required" class="comp_nm" type="number" name="fm_t_w_ustan" value=""><span>мм</span>
					</div>
					<div class="col-lg-12">
						<p class="sub-title-input">Давление</p>
					</div>
					<div class="col-lg-12">
						<input
							required="required" class="comp_nm" type="number" name="fm_t_h_ustan" value=""><span>бар</span>
					</div>
					<div class="col-lg-12">
						<p class="sub-title-input">Максимальное наполнение</p>
					</div>
					<div class="col-lg-12">
						<input
							required="required" class="comp_nm" type="number" name="fm_t_h_ustan_water" value=""><span>мм</span>
					</div>
				</div>
			</div>
		</div>

		<div class="relf_line"></div>
		<p class="title_form_omline">Количество дробилок</p>
		<div class="row">
			<div class="col-lg-3">
				<p class="sub-title-input">Робочих</p>
			</div>
			<div class="col-lg-9">
				<input
					required="required" class="comp_nm" type="number" min="0" name="fm_t_w_ustan_rob" value="">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<p class="sub-title-input">Резервных</p>
			</div>
			<div class="col-lg-9">
				<input
					required="required" class="comp_nm" type="number" min="1" name="fm_t_w_ustan_rez" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<p class="title_form_omline">Пылевлагозащита привод</p>
		<div class="row">
			<div class="col-lg-3">
				<label for="dst_prt1" class="sub-title-input">IP55</label>
			</div>
			<div class="col-lg-9">
				<input
					required="required" class="comp_nm" id="dst_prt1" type="radio" name="fm_dust_protection_no_full" value="">
				<label for="dst_prt1">(частичная защита от пыли; защита от струй со всех сорон под небольшим давлением)</label>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<label for="dst_prt2" class="sub-title-input">IP68</label>
			</div>
			<div class="col-lg-9">
				<input
					required="required" class="comp_nm" id="dst_prt2" type="radio" name="fm_dust_protection_no_full" value="">
				<label for="dst_prt2">(полная защита от пыли; полное погружение; устройство может работать под водой)</label>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-3">
				<p class="sub-title-input">Дополнительно указывается глубина погружения</p>
			</div>
			<div class="col-lg-9">
				<input
					required="required" class="comp_nm" type="number" min="1" name="fm_immersion_depth_protect" value=""><span>мм</span>
			</div>
		</div>
		<div class="relf_line"></div>
		<p class="title_form_omline">Шкаф управления</p>
		<div class="row">
			<div class="col-lg-6">
				<label for="manag_dummy1" class="sub-title-input">Установка в отапливаем помещении</label>
				<input
					required="required" class="comp_nm" id="manag_dummy1" type="radio" name="fm_manag_dummy1" value="">
			</div>
			<div class="col-lg-6">
				<label for="manag_dummy2" class="sub-title-input">Установка на улице</label>
				<input
					required="required" class="comp_nm" id="manag_dummy2" type="radio" name="fm_manag_dummy1" value="">
			</div>
		</div>
		<div class="relf_line"></div>
		<p class="title_form_omline">Дополнительные опции</p>
		<div class="row">
			<div class="col-lg-4">
				<label for="mont_rm1" class="sub-title-input">Монтажная рама</label>
				<input
					class="comp_nm" id="mont_rm1" type="checkbox" name="fm_dop_option_mont_ram" value="">
			</div>
			<div class="col-lg-4">
				<label for="mont_rm2" class="sub-title-input">Резервная ручная решетка</label>
				<input
					class="comp_nm" id="mont_rm2" type="checkbox" name="fm_dop_option_rezerv_lattice" value="">
			</div>
			<div class="col-lg-4">
				<label for="mont_rm3" class="sub-title-input">Ремонтный комплект</label>
				<input
					class="comp_nm" id="mont_rm3" type="checkbox" name="fm_dop_option_remont_comp" value="">
			</div>
		</div>
		</div>
		<?php
			require_once('form-elem/submit-button.php');
		?>
	</form>
</div>