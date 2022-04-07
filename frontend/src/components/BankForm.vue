<template>
    <div class="grid">
        <div class="col-span-6 sm:col-span-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Bank name</label>
            <input
                type="text"
                v-model="form.name"
                id="name"
                @change="dataChange"
                required
                class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            />
        </div>
        <div class="col-span-6 my-4 sm:col-span-2">
            <label for="bsb" class="block text-sm font-medium text-gray-700">BSB</label>
            <input
                type="text"
                @change="dataChange"
                v-model="form.bsb"
                id="bsb"
                required
                class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            />
        </div>
        <div class="col-span-6 sm:col-span-2">
            <label
                for="account_number"
                class="block text-sm font-medium text-gray-700"
            >Account number</label>
            <input
                type="text"
                @change="dataChange"
                v-model="form.account_number"
                id="account_number"
                required
                class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            />
        </div>
    </div>
</template>

<script setup>
const form = {
    name: "",
    bsb: "",
    account_number: "",
};
const emit = defineEmits(["change"]);


// Emit the data change
function dataChange() {
    emit("change", form);
}

</script>
<style scoped>
</style>






