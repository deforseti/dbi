<div class="online-get-prod-param">
	<form method="POST">
		<?php
			require_once('form-elem/common_values_inputs.php');
		?>

		<div class="relf_line"></div>

		<div class="row">
			<div class="w_type_w_block col-lg-12">
				<label><strong>Вид объекта: кафе, ресторан, гостиница и т.д.:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="text" value="">
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Время работы в сутки:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>час</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Количество посадочных мест:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>шт.</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Производительность сепаратора жира:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>л/сек</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Температура поступающих стоков:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>°С</span>
					</div>
				</div>
			</div>
		</div>

			<div class="relf_line"></div>

			<div class="row">
				<div class="col-lg-12">
					<p><strong>Вид сепаратора жира:</strong></p>
				</div>
				<div class="col-lg-3">
					<input
					required="required" id="er_rrt" class="comp_nm" type="radio" name="er_rrt" value="">
					<label for="er_rrt">железобетон</label>
				</div>
				<div class="col-lg-3">
					<input
					required="required" id="er_rrt1" class="comp_nm" type="radio" name="er_rrt" value="">
					<label for="er_rrt1">стеклопластик</label>
				</div>
				<div class="col-lg-3">
					<input
					required="required" id="er_rrt12" class="comp_nm" type="radio" name="er_rrt" value="">
					<label for="er_rrt12">пластик</label>
				</div>
				<div class="col-lg-3">
					<input
					required="required" id="er_rrt13" class="comp_nm" type="radio" name="er_rrt" value="">
					<label for="er_rrt13">сталь</label>
				</div>
			</div>

			<div class="relf_line"></div>
			
		<div class="row">
			<div class="w_type_w_block col-lg-12">
				<label><strong>Желаемый диаметр сепаратора жира, D (1000 / 1200 / 1600 / 1800 / 2000 / 2300 / 3000):</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>мм</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Глубина подводящей трубы (лоток), h:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>мм</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Диаметр подводящей трубы, Dвх:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>мм</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Направление подводящей трубы (3, 6, 9, 12):</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>часов</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Направление подводящей трубы (3, 6, 9, 12):</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>часов</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Диаметр отводящей трубы, Dвых:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>мм</span>
					</div>
				</div>
			</div>
			<div class="w_type_w_block col-lg-12">
				<label><strong>Направление отводящей трубы (3, 6, 9, 12):</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>часов</span>
					</div>
				</div>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Наличие сигнализатора толщины слоя жира (да/нет). Автоматика (опция)</strong></p>
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
			<div class="w_type_w_block col-lg-12">
				<label><strong>Расстояние от сигнализатора до сепаратора жира:</strong></label>
				<div class="row">
					<div class="col-lg-3">
						<input class="comp_nm" type="number" min="1" value=""><span>м</span>
					</div>
				</div>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Установка сепаратора жира:</strong></p>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="ds_ds1" class="comp_nm" type="radio" name="ds_ds1" value="">
				<label for="ds_ds1">в помещении</label>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="ds_ds11" class="comp_nm" type="radio" name="ds_ds1" value="">
				<label for="ds_ds11">под газоном</label>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="ds_ds12" class="comp_nm" type="radio" name="ds_ds1" value="">
				<label for="ds_ds12">под проезжей частью</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Установка воздушного фильтра для очистки воздуха от неприятных запахов (опция)</strong></p>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds__14" class="comp_nm" type="radio" name="ds__14" value="">
				<label for="ds__14">да</label>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="ds__15" class="comp_nm" type="radio" name="ds__14" value="">
				<label for="ds__15">нет</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Установка насосного оборудования для отвода воды из сепаратора (опция)</strong></p>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="dss__14" class="comp_nm" type="radio" name="dss__14" value="">
				<label for="dss__14">да</label>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="dss__15" class="comp_nm" type="radio" name="dss__14" value="">
				<label for="dss__15">нет</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Установка надставок (горловины) для сепаратора (опция)</strong></p>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="fd_yr" class="comp_nm" type="radio" name="fd_yr" value="">
				<label for="fd_yr">да</label>
			</div>
			<div class="col-lg-2">
				<input
				required="required" id="fd_yr1" class="comp_nm" type="radio" name="fd_yr" value="">
				<label for="fd_yr1">нет</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="row">
			<div class="col-lg-12">
				<p><strong>Тип люка:</strong></p>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="wq_w1" class="comp_nm" type="radio" name="wq_w1" value="">
				<label for="wq_w1">чугунный</label>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="wq_w2" class="comp_nm" type="radio" name="wq_w1" value="">
				<label for="wq_w2">пластиковый</label>
			</div>
			<div class="col-lg-4">
				<input
				required="required" id="wq_w3" class="comp_nm" type="radio" name="wq_w1" value="">
				<label for="wq_w3">стеклопластиковый</label>
			</div>
		</div>

		<div class="relf_line"></div>

		<div class="w_type_w_block col-lg-12">
			<label><strong>Уровень грунтовых вод (от уровня земли):</strong></label>
			<div class="row">
				<div class="col-lg-3">
					<input class="comp_nm" type="number" min="1" value=""><span>- м</span>
				</div>
			</div>
		</div>

		<div class="relf_line"></div>

		<?php
			require_once('form-elem/submit-button.php');
		?>
	</form>
</div>