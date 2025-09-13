export default {
  template: `
    <li>
      <label class="cursor-pointer bg-slate-700 hover:bg-slate-800 transition duration-200 ease-in-out w-full block p-2">
        <input type="checkbox" v-model="assignment.completed" class="mr-1" />
        {{ assignment.name }}
      </label>
    </li>
  `,

  props: {
    assignment: Array,
  },
}
