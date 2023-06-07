<template>
    <div>
        <el-card class="box-card">
            <div v-for="(draw, index) in combinationForm.draws" :key="index" class="draw-row">
                <el-row :gutter="10" justify="center">
                    <el-col :span="3">
                        <el-form-item
                            :show-message="combinationForm.errors[`draws.${index}.first_draw`] !== undefined"
                            :error="combinationForm.errors[`draws.${index}.first_draw`]"
                            :validate-status="combinationForm.errors[`draws.${index}.first_draw`] !== undefined ? 'error' : ''"
                        >
                            <el-input-number v-model="draw.first_draw" :min="1" :max="59" />
                        </el-form-item>
                    </el-col>
                    <el-col :span="3">
                        <el-form-item
                            :show-message="combinationForm.errors[`draws.${index}.second_draw`] !== undefined"
                            :error="combinationForm.errors[`draws.${index}.second_draw`]"
                            :validate-status="combinationForm.errors[`draws.${index}.second_draw`] !== undefined ? 'error' : ''"
                        >
                            <el-input-number v-model="draw.second_draw" :min="1" :max="59" />
                        </el-form-item>
                    </el-col>
                    <el-col :span="3">
                        <el-form-item
                            :show-message="combinationForm.errors[`draws.${index}.third_draw`] !== undefined"
                            :error="combinationForm.errors[`draws.${index}.third_draw`]"
                            :validate-status="combinationForm.errors[`draws.${index}.third_draw`] !== undefined ? 'error' : ''"
                        >
                            <el-input-number v-model="draw.third_draw" :min="1" :max="59" />
                        </el-form-item>
                    </el-col>
                    <el-col :span="3">
                        <el-form-item
                            :show-message="combinationForm.errors[`draws.${index}.fourth_draw`] !== undefined"
                            :error="combinationForm.errors[`draws.${index}.fourth_draw`]"
                            :validate-status="combinationForm.errors[`draws.${index}.fourth_draw`] !== undefined ? 'error' : ''"
                        >
                            <el-input-number v-model="draw.fourth_draw" :min="1" :max="59" />
                        </el-form-item>
                    </el-col>
                    <el-col :span="3">
                        <el-form-item
                            :show-message="combinationForm.errors[`draws.${index}.fifth_draw`] !== undefined"
                            :error="combinationForm.errors[`draws.${index}.fifth_draw`]"
                            :validate-status="combinationForm.errors[`draws.${index}.fifth_draw`] !== undefined ? 'error' : ''"
                        >
                            <el-input-number v-model="draw.fifth_draw" :min="1" :max="59" />
                        </el-form-item>
                    </el-col>
                    <el-col :span="3">
                        <el-form-item
                            :show-message="combinationForm.errors[`draws.${index}.sixth_draw`] !== undefined"
                            :error="combinationForm.errors[`draws.${index}.sixth_draw`]"
                            :validate-status="combinationForm.errors[`draws.${index}.sixth_draw`] !== undefined ? 'error' : ''"
                        >
                            <el-input-number v-model="draw.sixth_draw" :min="1" :max="59" />
                        </el-form-item>
                    </el-col>
                    <el-col :span="1">
                        <el-button type="success" circle @click="generateRandom(draw)">
                            <el-icon><Refresh /></el-icon>
                        </el-button>
                    </el-col>
                    <el-col :span="3" v-show="draw?.updated_at !== undefined">
                        <span>Last selected:</span> {{ new Date(draw.updated_at).toLocaleString() }}
                    </el-col>
                </el-row>
            </div>
            <div class="text-center">
                <el-button type="primary" :loading="loading" @click="submitCombinations">Submit</el-button>
            </div>
        </el-card>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'
import { Refresh } from '@element-plus/icons-vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({ draws: Object })

// draws
const combinationForm = useForm({
    draws : []
})
const numberOfDraw = ref(3);
onMounted(() => {
    for(let x = 0; x < numberOfDraw.value; x++)
    {
        let combination = combinationForm.draws.push({
            first_draw: 1,
            second_draw: 2,
            third_draw: 3,
            fourth_draw: 4,
            fifth_draw: 5,
            sixth_draw: 6,
        })
        generateRandom(combinationForm.draws[x])
    }
})

// gererate ramdom
const generateRandom = (draw) => {
    let drawn = []
    // let frame = 0
    // let ticks = 3
    // let drawPosition = 0
    // let numberToGenerate = 10
    // let generatedNumber = 0

    // if(frame > ticks) {
    //     drawPosition++
    //     frame = 0

    // }

    draw.first_draw = Math.floor(Math.random() * 59)
    drawn.push(draw.first_draw)

    draw.second_draw = Math.floor(Math.random() * 59)
    while(drawn.includes(draw.second_draw)) {
        draw.second_draw = Math.floor(Math.random() * 59)
    }
    drawn.push(draw.second_draw)

    draw.third_draw = Math.floor(Math.random() * 59)
    while(drawn.includes(draw.third_draw)) {
        draw.third_draw = Math.floor(Math.random() * 59)
    }
    drawn.push(draw.third_draw)

    draw.fourth_draw = Math.floor(Math.random() * 59)
    while(drawn.includes(draw.fourth_draw)) {
        draw.fourth_draw = Math.floor(Math.random() * 59)
    }
    drawn.push(draw.fourth_draw)

    draw.fifth_draw = Math.floor(Math.random() * 59)
    while(drawn.includes(draw.fifth_draw)) {
        draw.fifth_draw = Math.floor(Math.random() * 59)
    }
    drawn.push(draw.fifth_draw)

    draw.sixth_draw = Math.floor(Math.random() * 59)
    while(drawn.includes(draw.sixth_draw)) {
        draw.sixth_draw = Math.floor(Math.random() * 59)
    }
    drawn.push(draw.sixth_draw)
}

// Submit combinations
const loading = ref(false)
const submitCombinations = async () => {
    loading.value = true
    await combinationForm.post('/', {
        onSuccess: page => {
            combinationForm.draws = Array.from(props.draws)
        },
        onFinish: visit => {
            loading.value = false
        },
    })
}
</script>
<style scoped>
.box-card {
  width: 80%;
  margin: 0 auto;
}

.draw-row {
    margin-bottom: 20px;
}

.text-center {
    text-align: center;
}

:deep(.el-form-item__error) {
    color: #f56c6c;
    font-size: 12px;
    line-height: 1;
    top: 100%;
    left: 0;
}

:deep(.el-form-item.is-error .el-input__wrapper) {
    box-shadow: 0 0 0 1px #f56c6c inset;
}
</style>
