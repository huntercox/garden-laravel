<script setup>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

function handleDateClick(arg) {
	alert('date click! ' + arg.dateStr)
}
const calendarOptions = ref({
	plugins: [dayGridPlugin, interactionPlugin],
	initialView: 'dayGridMonth',
	dateClick: handleDateClick,
	events: [
		{ title: 'event 1', date: '2023-07-01' },
		{ title: 'event 2', date: '2023-07-02' }
	]
});
</script>
<template>
	<Head title="Calendar" />
	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Calendar</h2>
		</template>
		<div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
			<div class="mt-6 shadow-sm rounded-lg">
				<FullCalendar :options="calendarOptions" />
			</div>
		</div>
	</AuthenticatedLayout>
</template>