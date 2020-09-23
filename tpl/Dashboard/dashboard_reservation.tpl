{assign var=checkin value=$reservation->IsCheckinEnabled() && $reservation->RequiresCheckin()}
<tr class="reservation row" id="{$reservation->ReferenceNumber}">
    <td>{$j}</td>
    <td>{fullname first=$reservation->FirstName last=$reservation->LastName ignorePrivacy=$reservation->IsUserOwner($UserId)} {if !$reservation->IsUserOwner($UserId)}{html_image src="users.png" altKey=Participant}{/if}</td>
    <td>{$reservation->Resources|join:', '}
     {if $checkin}
           
                <button type="button" class="btn btn-xs col-xs-12 btn-success btnCheckin" data-referencenumber="{$reservation->ReferenceNumber}">
                    <i class="fa fa-sign-in"></i> {translate key=CheckIn}
                </button>
           
        {/if}
    </td>
    
    <td>{formatdate date=$reservation->StartDate->ToTimezone($Timezone) key=dashboard}</td>
    <td>{formatdate date=$reservation->EndDate->ToTimezone($Timezone) key=dashboard}</td>
    <td>
    {if $todays}{$TodaysReservationsHours[$i]}{/if}
    {if $Tomorrows}{$TomorrowsReservationsHours[$i]}{/if}
    {if $ThisWeeks}{$ThisWeeksReservationsHours[$i]}{/if}
    {if $NextWeeks}{$NextWeeksReservationsHours[$i]}{/if}
    </td>
   
</tr>

