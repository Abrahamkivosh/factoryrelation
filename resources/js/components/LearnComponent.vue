<template >
    <div>
        <h2>HELLO WORLD</h2><br>
        <h1>{{ count }}</h1>
    </div>
</template>
<script>
export default {
     mounted() {
            console.log('Component mounted.')
        },
        data: {
            count : 0
        }
}
</script>
