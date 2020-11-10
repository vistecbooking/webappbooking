{*
Copyright 2017 Nick Korbel

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

<li class="startNotice"
	data-value="{$resource->GetMinNotice()}"
	data-days="{$resource->GetMinNotice()->Days()}"
	data-hours="{$resource->GetMinNotice()->Hours()}"
	data-minutes="{$resource->GetMinNotice()->Minutes()}">
	{if $resource->HasMinNotice()}
		{translate key='ResourceMinNotice' args=$resource->GetMinNotice()}
	{else}
		{translate key='ResourceMinNoticeNone'}
	{/if}
</li>
<li class="endNotice"
	data-value="{$resource->GetMaxNotice()}"
	data-days="{$resource->GetMaxNotice()->Days()}"
	data-hours="{$resource->GetMaxNotice()->Hours()}"
	data-minutes="{$resource->GetMaxNotice()->Minutes()}">
	{if $resource->HasMaxNotice()}
		{translate key='ResourceMaxNotice' args=$resource->GetMaxNotice()}
	{else}
		{translate key='ResourceMaxNoticeNone'}
	{/if}
</li>
<li class="requiresApproval"
	data-value="{$resource->GetRequiresApproval()}">
	{if $resource->GetRequiresApproval()}
		{translate key='ResourceRequiresApproval'}
	{else}
		{translate key='ResourceRequiresApprovalNone'}
	{/if}
</li>
<li class="autoAssign"
	data-value="{$resource->GetAutoAssign()}">
	{if $resource->GetAutoAssign()}
		{translate key='ResourcePermissionAutoGranted'}
	{else}
		{translate key='ResourcePermissionNotAutoGranted'}
	{/if}
</li>
<!-- <li class="enableCheckin"
	data-value="{$resource->IsCheckInEnabled()}">
	{if $resource->IsCheckInEnabled()}
		{translate key=RequiresCheckInNotification}
	{else}
		{translate key=NoCheckInRequiredNotification}
	{/if}
</li> --!>
{if $resource->IsAutoReleased()}
<li class="autoRelease"
	 data-value="{$resource->GetAutoReleaseMinutes()}">
		{translate key=AutoReleaseNotification args=$resource->GetAutoReleaseMinutes()}
</li>
{/if}
