import axios from "../plugins/axios";


export default {
  async signin(params) {
    return await axios.post(`/auth/loginAdmin`, params)

  },
  async me() {
    return await axios.get('/auth/user')

  },
  async logout() {

    return await axios.post(`/auth/logout`);

  },
  async getClients(payload) {
    const response = await axios.get('/clients', payload);
    console.log('getClients', response);
    return response;
  }

}
