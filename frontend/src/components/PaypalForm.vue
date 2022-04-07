<template>
    <div class="grid">
        <div class="col-span-6 sm:col-span-2">
            <label
                for="email-address"
                class="block text-sm font-medium text-gray-700"
            >PayPal email address</label>
            <input
                type="text"
                @change="dataChange"
                v-model="form.email"
                name="email-address"
                id="email-address"
                autocomplete="email"
                required
                class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            />
        </div>
    </div>
</template>

<script setup>
const form = {
    email: "",
};
const emit = defineEmits(["change"]);


// Emit the data change
function dataChange() {
    emit("change", form);
}


</script>
<style scoped>
</style>






