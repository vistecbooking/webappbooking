{*
Copyright 2014-2017 Nick Korbel

This file is part of phpScheduleIt.

phpScheduleIt is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

phpScheduleIt is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with phpScheduleIt.  If not, see <http://www.gnu.org/licenses/>.
*}

{if $Attributes|count > 0}
    <div class="customAttributes">
        <div class="row">
            {foreach from=$Attributes item=attribute name=attributes}
                {if $smarty.foreach.attributes.index % 3 == 0}
                    </div>
                    <div class="row">
                {/if}
                <div class="customAttribute col-sm-4 col-xs-12">
                    {control type="AttributeControl" attribute=$attribute readonly=$ReadOnly}
                </div>
            {/foreach}
        </div>
    </div>
    <div class="clear">&nbsp;</div>
{/if}
{jsfile src="js/bootstrapvalidator/bootstrapValidator.min.js"}
<script type="text/javascript">
	$(document).ready(function () {
		var reservationForm = $('#form-reservation');
        if(reservationForm)
        {
            reservationForm.on('init.field.bv', function (e, data) {
                var $parent = data.element.parents('.form-group');
                var $icon = $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]');
                var validators = data.bv.getOptions(data.field).validators;
                if (validators.notEmpty)
                {
                    $icon.addClass('glyphicon glyphicon-asterisk').show();
                }
            })
            .off('success.form.bv')
            .on('success.form.bv', function (e) {
                e.preventDefault();
            });
            reservationForm.bootstrapValidator();
        }
    });
</script>