function PositionManagement(opts) {
	var options = opts;

	var elements = {
		activeId: $('#activeId'),
		positionList: $('#positionList'),

		autocompleteSearch: $('#positionSearch'),

		deleteDialog: $('#deleteDialog'),
		renameDialog: $('#renameDialog'),
		
		renamePositionForm: $('#renamePositionForm'),
		deletePositionForm: $('#deletePositionForm'),
		addForm: $('#addPositionForm'),
	};

	var allUserList = null;

	PositionManagement.prototype.init = function() {

		elements.positionList.delegate('a.update', 'click', function(e) {
			setActiveId($(this));
			e.preventDefault();
		});

		elements.positionList.delegate('.rename', 'click', function() {
			renamePosition();
		});

		elements.positionList.delegate('.delete', 'click', function() {
			deletePosition();
		});

		elements.autocompleteSearch.autocomplete({
			source: function(request, response) {
				$.ajax({
					url: options.positionAutocompleteUrl,
					dataType: "json",
					data: {
						term: request.term
					},
					success: function(data) {
						response($.map(data, function(item) {
							return {
								label: item.Name,
								value: item.Id
							}
						}));
					}
				});
			},
			focus: function(event, ui) {
				elements.autocompleteSearch.val(ui.item.label);
				return false;
			},
			select: function(event, ui) {
				elements.autocompleteSearch.val(ui.item.label);
				window.location.href = options.selectPositionUrl + ui.item.value
				return false;
			}
		});

		$(".save").click(function() {
			$(this).closest('form').submit();
		});

		$(".cancel").click(function() {
			$(this).closest('.dialog').modal("hide");
		});

		var error = function(errorText) {
			alert(errorText);
		};
		
		ConfigureAsyncForm(elements.renamePositionForm, getSubmitCallback(options.actions.renamePosition), null, error);
		ConfigureAsyncForm(elements.deletePositionForm, getSubmitCallback(options.actions.deletePosition), null, error);
		ConfigureAsyncForm(elements.addForm, getSubmitCallback(options.actions.addPosition), null, error);
	};

	var getSubmitCallback = function(action) {
		return function() {
			return options.submitUrl + "?pstid=" + getActiveId() + "&action=" + action;
		};
	};

	function setActiveId(activeElement) {
		var id = activeElement.closest('tr').attr('data-group-id');
		elements.activeId.val(id);
	}

	function getActiveId() {
		return elements.activeId.val();
	}

	var renamePosition = function() {
		elements.renameDialog.modal('show');
	};

	var deletePosition = function() {
		elements.deleteDialog.modal('show');
	};
}