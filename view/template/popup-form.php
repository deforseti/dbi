<!-- modal -->
		<div class="modal-body">
			<div class="modal-content">
				<form method="POST">
					<div>
						<span class="close glyphicon glyphicon-remove" aria-hidden="true"></span>
					</div>
					<div>
						<input type="text" placeholder="Имя*" required="required" name="u_name">
					</div>
					<div>
						<input type="email" placeholder="Email*" required="required" name="u_email">
					</div>
					<div>
						<input type="phone" placeholder="Телефон" name="u_phone">
					</div>
					<div>
						<textarea name="u_text" placeholder="Сообщение"></textarea>
					</div>
					<div id="popup_form_recapcha"></div>
					<div>
						<input type="submit" disabled="disabled" name="send_from_dbi" value="Отправить">
					</div>
				</form>
			</div>
			<div class="bg_toggle"></div>
		</div>
		<div class="arrow_go_top">
			<img src="/uploads/images/upp.png">
		</div>

	<!-- end modal -->