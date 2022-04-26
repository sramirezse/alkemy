import axios from "../plugins/axios";


export default {
  async uploadImagesToBanner(params) {
    const formData = new FormData();
    formData.append("file", params.image);
    formData.append("name", params.name);
    formData.append("section", params.section_id);
    formData.append("prefix", params.prefix);
    return await axios.post(`/uploadImagesToBanner`, formData,{
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })

  },
  async fetchSection1(params) {
    return await axios.get('fetchImagesToBanner', params);
  },

}
