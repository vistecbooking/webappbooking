{include file='globalheader.tpl' Select2=true Qtip=true Fullcalendar=true cssFiles='scripts/css/jqtree.css'}
{cssfile src='scripts/newcss/calendar.css'}

<div class="page-search-availability">

    <form role="form" name="searchForm" id="searchForm" method="post"
          action="{$smarty.server.SCRIPT_NAME}?action=search">
       {* <div class="form-group col-xs-12 col-sm-3">
            <div class="checkbox">
                <input type="checkbox" id="anyResource" checked="checked"/>
                <label for="anyResource">{translate key=AnyResource}</label>
            </div>
        </div> *}

    <div class="container">
      <div class="box box-lg mb-4">
        <h2>Find a time</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="resourceGroups">Select Equipment (Only booking)</label>
                 <select id="resourceGroups" class="form-control"  {formname key=RESOURCE_ID multi=true} required>
                    {foreach from=$Resources item=resource}
                        <option value="{$resource->GetId()}">{$resource->GetName()}</option>
                    {/foreach}
                </select> 
            </div>
          </div>
          <div class="col-md-auto">
            <div class="form-group">
              <label for="Time to use">Time to use</label>
              <br />
              <input id="hours" {formname key=HOURS} class="time" type="number" min="0" step="1" value="0" style="height: auto;" />
              <span>Hours</span>
              <input id="minutes" {formname key=MINUTES} class="time" type="number" min="0" step="30" value="30" style="height: auto;" />
              <span>Minutes</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5">
            <div class="form-group">
              <label for="">Day to use</label>
              <div
                class="btn-group btn-group-toggle d-flex"
                data-toggle="buttons"
              >
                <label class="btn btn-outline-success active">
                  <input
                    type="radio"
                    name="options"
                    autocomplete="off"
                    id="today" checked="checked"
                    value="today" {formname key=AVAILABILITY_RANGE} 
                  />
                 <span class="hidden-xs">{translate key=Today}</span>
                 <span> {format_date date=$Today key=calendar_dates}</span> 
                </label>
                <label class="btn btn-outline-success">
                  <input type="radio" name="options" autocomplete="off" id="tomorrow" value="tomorrow" {formname key=AVAILABILITY_RANGE} />
                  Tomorrow
                </label>
                <label class="btn btn-outline-success">
                  <input type="radio" name="options" autocomplete="off" id="thisweek" value="thisweek" {formname key=AVAILABILITY_RANGE} />
                  This week
                </label>
                <label class="btn btn-outline-success">
                  <input type="radio" name="options" autocomplete="off" id="daterange" value="daterange" {formname key=AVAILABILITY_RANGE} />
                  Custom date
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-lg-auto">
            <div class="">
                    <input type="text" id="beginDate" class="inline dateinput"
                        placeholder="{translate key=BeginDate}" disabled="disabled"/>
                    <input type="hidden" id="formattedBeginDate" {formname key=BEGIN_DATE} />
                    -
                    <input type="text" id="endDate" class="inline dateinput"
                        placeholder="{translate key=EndDate}" disabled="disabled"/>
                    <input type="hidden" id="formattedEndDate" {formname key=END_DATE} />
                <!-- <a href="#" data-toggle="collapse" data-target="#advancedSearchOptions">{translate key=MoreOptions}</a> --!>
                </div> 
            </div>
        </div>
        <div class="row justify-content-center">
          <button class="btn btn-success search" type="submit" value="submit" {formname key=SUBMIT} >Search</button>
          <center>{indicator}</center>
        </div>
      </div>
    </div>

        <div class="clearfix"></div>

        <div class="clearfix"></div>

        <div class="collapse" id="advancedSearchOptions">
            <div class="form-group col-xs-6">
                <label for="maxCapacity" class="hidden">{translate key=MinimumCapacity}</label>
                <input type='number' id='maxCapacity' min='0' size='5' maxlength='5'
                       class="form-control input-sm" {formname key=MAX_PARTICIPANTS}
                       value="{$MaxParticipantsFilter}" placeholder="{translate key=MinimumCapacity}"/>

            </div>
            <div class="form-group col-xs-6">
                <label for="resourceType" class="hidden">{translate key=ResourceType}</label>
                <select id="resourceType" {formname key=RESOURCE_TYPE_ID} {formname key=RESOURCE_TYPE_ID}
                        class="form-control input-sm">
                    <option value="">- {translate key=ResourceType} -</option>
                    {object_html_options options=$ResourceTypes label='Name' key='Id' selected=$ResourceTypeIdFilter}
                </select>
            </div>

            <div>
                {foreach from=$ResourceAttributes item=attribute}
                    {control type="AttributeControl" attribute=$attribute align='vertical' searchmode=true namePrefix='r' class="col-sm-6 col-xs-12" inputClass="input-sm"}
                {/foreach}
                {if $ResourceAttributes|count%2 != 0}
                    <div class="col-sm-6 hidden-xs">&nbsp;</div>
                {/if}
            </div>

            <div>
                {foreach from=$ResourceTypeAttributes item=attribute}
                    {control type="AttributeControl" attribute=$attribute align='vertical' searchmode=true namePrefix='rt' class="col-sm-6 col-xs-12" inputClass="input-sm"}
                {/foreach}
                {if $ResourceTypeAttributes|count%2 != 0}
                    <div class="col-sm-6 hidden-xs">&nbsp;</div>
                {/if}
            </div>
        </div>
    </form>

    <div class="clearfix"></div>
    {assign var=pageUrl value={Pages::OPENINGS}}
    {assign var=pageIdSuffix value="calendar"}
    {assign var=subscriptionTpl value="calendar.subscription.tpl"}
    {include file="SearchAvailability/calendar-page-base.tpl"} 

    {*<div id="availability-results"></div>*}

    {csrf_token}

    {jsfile src="js/tree.jquery.js"}
    {jsfile src="js/jquery.cookie.js"}
    {jsfile src="ajax-helpers.js"}
    {jsfile src="availability-search.js"}

    {control type="DatePickerSetupControl" ControlId="beginDate" AltId="formattedBeginDate" DefaultDate=$StartDate}
    {control type="DatePickerSetupControl" ControlId="endDate" AltId="formattedEndDate" DefaultDate=$StartDate}

    <script type="text/javascript">

        $(document).ready(function () {
            var opts = {
                reservationUrlTemplate: "{$Path}{Pages::RESERVATION}?{QueryStringKeys::RESOURCE_ID}=[rid]&{QueryStringKeys::START_DATE}=[sd]&{QueryStringKeys::END_DATE}=[ed]"
            };
            var search = new AvailabilitySearch(opts);
            search.init();

            $('#resourceGroups').select2({
                placeholder: '{translate key=Resources}'
            });
        });

    </script>

</div>
