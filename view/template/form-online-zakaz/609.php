<div class="online-get-prod-param">
	<form method="POST">
		<?php
			require_once('form-elem/common_values_inputs.php');
		?>

		<div class="relf_line"></div>
		<p class="title_form_omline">Основные данные для выбора оборудования:</p>
		<div class="row inline_block_st">
			<div class="col-lg-4 w_type_w_block">
				<label>Максимальный приток сточных вод:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м<sup>3</sup>/ч</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Напор насоса:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Количество робочих насосов:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>шт</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Количество резервных насосов:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>шт</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Количество запасных насосов на склад:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>шт</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Длинна напорного трубопровода:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Разность геодезийских высот начала и конца напорного трубопровода:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Количество напорных трубопроводов на выходе из КНС:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>шт</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Наружный диаметр самотечного трубопровода Д1:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Наружный диаметр напорного трубопровода Д2:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>Глубина заложения самоточного трубопровода H1 (от уровня земли до низа трубы):</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
			</div>
		</div>
		
		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Глубина заложения напорного трубопровода H2 (от уровня земли до низа трубы):</strong></p>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>внутри КНС</label>
				<input
				required="required" class="comp_nm" type="number" name="var_pogr_q1" value=""><span>мм</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>на подводящем трубопроводе</label>
				<input
				required="required" class="comp_nm" type="number" name="var_pogr_q2" value=""><span>мм</span>
			</div>
			<div class="col-lg-4 w_type_w_block">
				<label>на подводящем лотке</label>
				<input
				required="required" class="comp_nm" type="number" name="var_pogr_q3" value=""><span>мм</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Вид стоков:</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="vd_stock1">Хоз. быт.</label>
				<input
				required="required" id="vd_stock1" class="comp_nm" type="radio" name="vid_stokov" value="">
			</div>
			<div class="col-lg-4">
				<label for="vd_stock2">промышленные</label>
				<input
				required="required" id="vd_stock2" class="comp_nm" type="radio" name="vid_stokov" value="">
			</div>
			<div class="col-lg-4">
				<label for="vd_stock3">ливневые</label>
				<input
				required="required" id="vd_stock3" class="comp_nm" type="radio" name="vid_stokov" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Необходимость установки дробилок (измельчителей) для сточных вод</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="dr_stck1">внутри КНС</label>
				<input
				required="required" id="dr_stck1" class="comp_nm" type="radio" name="drob_stock_in" value="">
			</div>
			<div class="col-lg-4">
				<label for="dr_stck2">на подводящем трубопроводе</label>
				<input
				required="required" id="dr_stck2" class="comp_nm" type="radio" name="drob_stock_in" value="">
			</div>
			<div class="col-lg-4">
				<label for="dr_stck3">на подводящем лотке</label>
				<input
				required="required" id="dr_stck3" class="comp_nm" type="radio" name="drob_stock_in" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Необходимость установки воздушных фильтров для устранения неприятных запахов (газов) от сточных вод</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="zph_stkc1">под крышкой люка КНС</label>
				<input
				required="required" id="zph_stkc1" class="comp_nm" type="radio" name="dr_vod_zph_nm" value="">
			</div>
			<div class="col-lg-4">
				<label for="zph_stkc2">снаружи КНС</label>
				<input
				required="required" id="zph_stkc2" class="comp_nm" type="radio" name="dr_vod_zph_nm" value="">
			</div>
			<div class="col-lg-4">
				<label for="zph_stkc3">в отдельном маш. зале</label>
				<input
				required="required" id="zph_stkc3" class="comp_nm" type="radio" name="dr_vod_zph_nm" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Использование шкафа управления насосами</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="dsh_pmps1">на улице</label>
				<input
				required="required" id="dsh_pmps1" class="comp_nm" type="radio" name="dashboard_opt_pumps" value="">
			</div>
			<div class="col-lg-4">
				<label for="dsh_pmps2">в помещении</label>
				<input
				required="required" id="dsh_pmps2" class="comp_nm" type="radio" name="dashboard_opt_pumps" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Опция управления насосами и дробилками</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="opt_upr_dfr1">плавный пуск</label>
				<input
				required="required" id="opt_upr_dfr1" class="comp_nm" type="radio" name="opt_uprvl_pmp_drob" value="">
			</div>
			<div class="col-lg-4">
				<label for="opt_upr_dfr2">частотный привод</label>
				<input
				required="required" id="opt_upr_dfr2" class="comp_nm" type="radio" name="opt_uprvl_pmp_drob" value="">
			</div>
			<div class="col-lg-4">
				<label for="opt_upr_dfr3">диспетчеризация</label>
				<input
				required="required" id="opt_upr_dfr3" class="comp_nm" type="radio" name="opt_uprvl_pmp_drob" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Количество вводов эл. питания</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="col_pt_min1">один</label>
				<input
				required="required" id="col_pt_min1" class="comp_nm" type="radio" name="col_vv_elemet_pitt" value="">
			</div>
			<div class="col-lg-4">
				<label for="col_pt_min2">два</label>
				<input
				required="required" id="col_pt_min2" class="comp_nm" type="radio" name="col_vv_elemet_pitt" value="">
			</div>
			<div class="col-lg-4">
				<label for="col_pt_min3">два с АВР</label>
				<input
				required="required" id="col_pt_min3" class="comp_nm" type="radio" name="col_vv_elemet_pitt" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12">
				<p class="title_form_omline_mm"><strong>Необходимо ли наземное строение (павильон)</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="nd_pvl1">да</label>
				<input
				required="required" id="nd_pvl1" class="comp_nm" type="radio" name="need_pavil_on" value="">
			</div>
			<div class="col-lg-4">
				<label for="nd_pvl2">нет</label>
				<input
				required="required" id="nd_pvl2" class="comp_nm" type="radio" name="need_pavil_on" value="">
			</div>
		</div>
		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12 w_type_w_block">
				<label class="title_form_omline_mm"><strong>Дополнительные требования:</strong></label>
				<textarea
				class="comp_nm"></textarea>
			</div>
		</div>
		





		<?php
			require_once('form-elem/submit-button.php');
		?>
	</form>
</div>