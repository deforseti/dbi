<div class="online-get-prod-param">
	<form method="POST">
		<?php
			require_once('form-elem/common_values_inputs.php');
		?>

		<div class="relf_line"></div>
		<p class="title_form_omline">Тип арматуры:</p>
		<div class="row columRadioWrapper">
			<div class="col-lg-3">
				<label for="d_arma1"><strong>Запорный клапан</strong></label>
				<input
				required="required" id="d_arma1" class="comp_nm" type="radio" name="type_zpr_arma" value="">
				<div class="w_type_w_block">
					<label>Размер трубы</label>
					<input
					required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
				</div>
			</div>
			<div class="col-lg-3">
				<label for="d_arma2"><strong>Клиновая задвижка</strong></label>
				<input
				required="required" id="d_arma2" class="comp_nm" type="radio" name="type_zpr_arma" value="">
				<div class="w_type_w_block">
					<label>DN</label>
					<input
					required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
				</div>
			</div>
			<div class="col-lg-3">
				<label for="d_arma1"><strong>Дисковый затвор</strong></label>
				<input
				required="required" id="d_arma1" class="comp_nm" type="radio" name="type_zpr_arma" value="">
				<div class="w_type_w_block">
					<label>PN (DIN)</label>
					<input
					required="required" class="comp_nm" type="number" min="0" value="">
				</div>
			</div>
			<div class="col-lg-3">
				<label for="d_arma1"><strong>Шиберная задвижка</strong></label>
				<input
				required="required" id="d_arma1" class="comp_nm" type="radio" name="type_zpr_arma" value="">
				<div class="w_type_w_block">
					<label>Класс (ANSI)</label>
					<input
					required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
				</div>
			</div>
		</div>


		<div class="relf_line"></div>
		<p class="title_form_omline">Данные о процессе</p>
		<div class="row">
			<div class="col-lg-12">
				<p><strong>Состояние среды:</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="jd_we1">Жидкость</label>
				<input
				required="required" id="jd_we1" class="comp_nm" type="radio" name="jid_fg_val" value="">
			</div>
			<div class="col-lg-4">
				<label for="jd_we2">Чистая вода</label>
				<input
				required="required" id="jd_we2" class="comp_nm" type="radio" name="jid_fg_val" value="">
			</div>
			<div class="col-lg-4">
				<label for="jd_we3"><strong>Сточная вода</strong></label>
				<input
				required="required" id="jd_we3" class="comp_nm" type="radio" name="jid_fg_val" value="">
				<div class="w_type_w_block">
					<label>Размерность частиц в сточной воде</label>
					<input
					 class="comp_nm ffg_jd_we3" type="number" min="0" value=""><span>мм</span>
				</div>
			</div>
		</div>
		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12 w_type_w_block">
				<label><strong>Состав среды:</strong></label>
				<textarea
				class="comp_nm"></textarea>
			</div>
		</div>
		<div class="relf_line"></div>
		<div class="row">
			<div class="w_type_w_block col-lg-4">
				<label>Разход:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>м<sup>3</sup>/ч</span>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Давление:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>бар</span>
			</div>
			<div class="w_type_w_block col-lg-4">
				<label>Температура:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span><sup>&#176;</sup>С</span>
			</div>
		</div>

		<div class="relf_line"></div>
		<p class="title_form_omline">Корпус клапана</p>
		<div class="row">
			<div class="col-lg-6 w_type_w_block">
				<label>DN:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>мм</span>
			</div>
			<div class="col-lg-6 w_type_w_block">
				<label>PN:</label>
				<input
				required="required" class="comp_nm" type="number" min="0" value=""><span>атм</span>
			</div>
		</div>
		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4">
				<p><strong>Назначение:</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="df_nanj1">Запорный</label>
				<input
				required="required" id="df_nanj1" class="comp_nm" type="radio" name="nzn_fg" value="">
			</div>
			<div class="col-lg-4">
				<label for="df_nanj2">Регулирующий</label>
				<input
				required="required" id="df_nanj2" class="comp_nm" type="radio" name="nzn_fg" value="">
			</div>
		</div>
		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-3">
				<p><strong>Присоединение:</strong></p>
			</div>
			<div class="col-lg-3">
				<label for="priz_nav_e1">Фланец</label>
				<input
				required="required" id="priz_nav_e1" class="comp_nm" type="radio" name="priz_fg_name_val" value="">
			</div>
			<div class="col-lg-3">
				<label for="priz_nav_e2">Резьба</label>
				<input
				required="required" id="priz_nav_e2" class="comp_nm" type="radio" name="priz_fg_name_val" value="">
			</div>
			<div class="col-lg-3">
				<label for="priz_nav_e3">Межфланец</label>
				<input
				required="required" id="priz_nav_e3" class="comp_nm" type="radio" name="priz_fg_name_val" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-6 w_type_w_block">
				<label>Герметичность, класс:</label>
				<input
				required="required" class="comp_nm" type="text" min="0" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-3">
				<p><strong>Управление:</strong></p>
			</div>
			<div class="col-lg-3">
				<label for="uprv_zadv1">Маховик</label>
				<input
				required="required" id="uprv_zadv1" class="comp_nm" type="radio" name="drive_zadv" value="">
			</div>
			<div class="col-lg-3">
				<label for="uprv_zadv2">Ручка</label>
				<input
				required="required" id="uprv_zadv2" class="comp_nm" type="radio" name="drive_zadv" value="">
			</div>
			<div class="col-lg-3">
				<label for="uprv_zadv3">Шток</label>
				<input
				required="required" id="uprv_zadv3" class="comp_nm" type="radio" name="drive_zadv" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-3">
				<p><strong>Привод:</strong></p>
			</div>
			<div class="col-lg-3">
				<label for="prvd_type1">Пневмо</label>
				<input
				required="required" id="prvd_type1" class="comp_nm" type="radio" name="privd_type_s" value="">
			</div>
			<div class="col-lg-3">
				<label for="prvd_type2">Електро</label>
				<input
				required="required" id="prvd_type2" class="comp_nm" type="radio" name="privd_type_s" value="">
			</div>
			<div class="col-lg-3">
				<label for="prvd_type3">Стойка</label>
				<input
				required="required" id="prvd_type3" class="comp_nm" type="radio" name="privd_type_s" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4">
				<p><strong>Напряжение питания:</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="naprj_pitn1">220В</label>
				<input
				required="required" id="naprj_pitn1" class="comp_nm" type="radio" name="naprj_pitn" value="">
			</div>
			<div class="col-lg-4">
				<label for="naprj_pitn2">380В</label>
				<input
				required="required" id="naprj_pitn2" class="comp_nm" type="radio" name="naprj_pitn" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-3">
				<p><strong>Положение безопасности:</strong></p>
			</div>
			<div class="col-lg-3">
				<label for="polj_protect1">открыт</label>
				<input
				required="required" id="polj_protect1" class="comp_nm" type="radio" name="polj_protect" value="">
			</div>
			<div class="col-lg-3">
				<label for="polj_protect2">закрыт</label>
				<input
				required="required" id="polj_protect2" class="comp_nm" type="radio" name="polj_protect" value="">
			</div>
			<div class="col-lg-3">
				<label for="polj_protect3">не меняется</label>
				<input
				required="required" id="polj_protect3" class="comp_nm" type="radio" name="polj_protect" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4">
				<p><strong>Ручной дублер:</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="hand_ddbl1">да</label>
				<input
				required="required" id="hand_ddbl1" class="comp_nm" type="radio" name="hand_ddbl" value="">
			</div>
			<div class="col-lg-4">
				<label for="hand_ddbl2">нет</label>
				<input
				required="required" id="hand_ddbl2" class="comp_nm" type="radio" name="hand_ddbl" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4">
				<p><strong>Концевые выключатели:</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="conts_switcher1">да</label>
				<input
				required="required" id="conts_switcher1" class="comp_nm" type="radio" name="conts_switcher" value="">
			</div>
			<div class="col-lg-4">
				<label for="conts_switcher2">нет</label>
				<input
				required="required" id="conts_switcher2" class="comp_nm" type="radio" name="conts_switcher" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4">
				<p><strong>Обратная связь:</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="feedback_transfr1">да</label>
				<input
				required="required" id="feedback_transfr1" class="comp_nm" type="radio" name="feedback_transfr" value="">
			</div>
			<div class="col-lg-4">
				<label for="feedback_transfr2">нет</label>
				<input
				required="required" id="feedback_transfr2" class="comp_nm" type="radio" name="feedback_transfr" value="">
			</div>
		</div>

		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-4">
				<p><strong>Взрывозащита:</strong></p>
			</div>
			<div class="col-lg-4">
				<label for="boom_protect_f1">да</label>
				<input
				required="required" id="boom_protect_f1" class="comp_nm" type="radio" name="boom_protect_f" value="">
			</div>
			<div class="col-lg-4">
				<label for="boom_protect_f2">нет</label>
				<input
				required="required" id="boom_protect_f2" class="comp_nm" type="radio" name="boom_protect_f" value="">
			</div>
		</div>
		<div class="relf_line"></div>
		<div class="row">
			<div class="col-lg-12 w_type_w_block">
				<label><strong>Примечание:</strong></label>
				<textarea
				class="comp_nm"></textarea>
			</div>
		</div>
		




		<?php
			require_once('form-elem/submit-button.php');
		?>
	</form>
</div>