<div class="online-get-prod-param">
	<form method="POST">
		<?php
			require_once('form-elem/common_values_inputs.php');
		?>


		<div class="relf_line"></div>
		<div class="row">
			<div class="w_type_w_block col-lg-12">
				<label><strong>Производительность системы (если известна):</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>л/с</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Характер территории: автопредприятие, заправка, складская зона, нефтебаза, промпредприятие и т.п.:</strong></label>
				<input required="required" class="comp_nm" type="text" value="">
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Максимальный объем стоков (если известен):</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>л</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Площадь сбора стоков:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>га</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Требуемая степень очистки по взвешенным веществам:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="0.0001" value=""><span>мг/л</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Требуемая степень очистки по нефтепродуктам:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="0.0001" value=""><span>мг/л</span>
					</div>
				</div>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Тип поверхности для сбора стоков</strong></p>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="jd_we1" class="comp_nm" type="radio" name="jd_we1" value="">
				<label for="jd_we1">асфальт или бетон</label>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="jd_we2" class="comp_nm" type="radio" name="jd_we1" value="">
				<label for="jd_we2">песок, открытый грунт</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Плотность нефтепродуктов на входе, г/см³</strong></p>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="jd_we3" class="comp_nm" type="radio" name="jd_we3" value="">
				<label for="jd_we3">< 0,85</label>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="jd_wew" class="comp_nm" type="radio" name="jd_we3" value="">
				<label for="jd_wew">> 0,95</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="w_type_w_block col-lg-12">
				<label><strong>Концентрация взвешенных веществ на входе:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input required="required" class="comp_nm" type="number" min="1" value=""><span>мг/л</span>
					</div>
				</div>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Точка сброса очищенных стоков</strong></p>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="jd_wedd" class="comp_nm" type="radio" name="jd_wedd" value="">
				<label for="jd_wedd">в канализацию</label>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="jd_sas" class="comp_nm" type="radio" name="jd_wedd" value="">
				<label for="jd_sas">в водоем</label>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="jd_weas" class="comp_nm" type="radio" name="jd_wedd" value="">
				<label for="jd_weas">в грунт</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="w_type_w_block col-lg-12">
				<label><strong>Глубина залегания подводящего трубопровода:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input required="required" class="comp_nm" type="number" min="1" value=""><span>м</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Диаметр подводящего трубопровода, D вх:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input required="required" class="comp_nm" type="number" min="1" value=""><span>мм</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Диаметр отводящей трубы, D вых:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input required="required" class="comp_nm" type="number" min="1" value=""><span>мм</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Направление подводящей трубы (3, 6, 9, 12), часов:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input required="required" class="comp_nm" type="number" min="1" value="">
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Направление отводящей трубы (3, 6, 9, 12), часов:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input required="required" class="comp_nm" type="number" min="1" value="">
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Глубина промерзания грунта:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input required="required" class="comp_nm" type="number" min="1" value=""><span>м</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Уровень грунтовых вод на участке монтажа:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input required="required" class="comp_nm" type="number" min="1" value=""><span>м</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Размер участка, отводимый под монтаж:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input required="required" class="comp_nm" type="number" min="1" value=""><span>м²</span>
					</div>
				</div>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Тип люка: чугунный, пластиковый, стеклопластиковый</strong></p>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="jd_wdl" class="comp_nm" type="radio" name="jd_wdl" value="">
				<label for="jd_wdl">да</label>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="jd_wepo" class="comp_nm" type="radio" name="jd_wdl" value="">
				<label for="jd_wepo">нет</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Наличие сигнализатора толщины слоя нефти - шлама (да/нет). Автоматика (опция)</strong></p>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds10" class="comp_nm" type="radio" name="ds10" value="">
				<label for="ds10">да</label>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds11" class="comp_nm" type="radio" name="ds10" value="">
				<label for="ds11">нет</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Лестницы (опция)</strong></p>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds12" class="comp_nm" type="radio" name="ds12" value="">
				<label for="ds12">да</label>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds13" class="comp_nm" type="radio" name="ds12" value="">
				<label for="ds13">нет</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Система «бай-пасс» или шлам-камера (опция)</strong></p>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds14" class="comp_nm" type="radio" name="ds14" value="">
				<label for="ds14">да</label>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds15" class="comp_nm" type="radio" name="ds14" value="">
				<label for="ds15">нет</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Установка надставок (горловины) для сепаратора (опция)</strong></p>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds16" class="comp_nm" type="radio" name="ds16" value="">
				<label for="ds16">да</label>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds17" class="comp_nm" type="radio" name="ds16" value="">
				<label for="ds17">нет</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Установка насосного оборудования для отвода воды из сепаратора (опция)</strong></p>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds18" class="comp_nm" type="radio" name="ds18" value="">
				<label for="ds18">да</label>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds19" class="comp_nm" type="radio" name="ds18" value="">
				<label for="ds19">нет</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Установка воздушного фильтра для очистки воздуха от неприятных запахов (опция)</strong></p>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds20" class="comp_nm" type="radio" name="ds20" value="">
				<label for="ds20">да</label>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds21" class="comp_nm" type="radio" name="ds20" value="">
				<label for="ds21">нет</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<?php
			require_once('form-elem/submit-button.php');
		?>
	</form>
</div>