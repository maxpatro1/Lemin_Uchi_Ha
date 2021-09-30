import axios from "axios";

class QuestionPackResource {
    static async fetchQuestionPacks() {
        const { data } = await axios.get(this.url)
        return data
    }
    static async saveQuestionPacks(params) {
        const { data } = await axios.post(this.url, params)
        return data
    }
}

QuestionPackResource.url = '/api/question-pack'

export default QuestionPackResource
