<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Plant from '@/Components/Plant.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head } from '@inertiajs/vue3';

defineProps(['plants'], { message: String });
</script>
<template>
	<Head title="About" />
	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">About</h2>
		</template>
		<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
			<div class="mt-6 shadow-sm rounded-lg divide-y">
				<article>
					<h1 class="text-3xl mb-5">About this app...</h1>
					<p class="text-md">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur ducimus doloremque
						similique eius ex hic ullam porro itaque veritatis odio nihil, voluptates temporibus delectus, cum minus
						pariatur a consequatur exercitationem.
						<br /><br />
						Quae dolores hic sed architecto aliquam velit aut deserunt labore repellendus odit esse autem aspernatur quo,
						ipsum illo voluptas quidem ad deleniti dolore sunt iste totam assumenda alias? Id, reprehenderit possimus.
						Eius
						rerum nihil deleniti! Aliquam aut quaerat nulla repellat soluta quibusdam tempore iste! Modi, laudantium quod
						esse reiciendis libero officia ex error atque, autem suscipit doloribus voluptatibus qui iusto labore quas
						incidunt eligendi nisi nulla. Alias amet qui possimus ea magni.
					</p>
				</article>
			</div>
		</div>
	</AuthenticatedLayout>
</template>