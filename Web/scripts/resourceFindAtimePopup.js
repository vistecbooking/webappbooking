$.fn.attachResourceFindATimePopup = function (resId, isFull) {
	var me = $(this);
	
	var	detailsUrl = 'ajax/resource_details.php?rid=' + resId + '&fd=' + isFull;

	me.qtip({
		position: {
			my: 'bottom left', at: 'top left', effect: false, viewport: $(window), adjust: {
				mouse: 'flip'
			}
		},

		content: {
			text: function (event, api) {
				$.ajax({url: detailsUrl})
						.done(function (html) {
							api.set('content.text', html)
						})
						.fail(function (xhr, status, error) {
							api.set('content.text', status + ': ' + error)
						});

				return 'Loading...';
			}
		},

		show: {
			delay: 700, effect: false
		},

		hide: {
			fixed: true, delay: 500
		},

		style: {
			classes: 'qtip-light qtip-bootstrap'
		}
	});
};