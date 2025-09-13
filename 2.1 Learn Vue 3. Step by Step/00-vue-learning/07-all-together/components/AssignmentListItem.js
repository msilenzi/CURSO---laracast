export default {
  template: `
    <li>
      <label class="cursor-pointer bg-slate-700 hover:bg-slate-800 transition duration-200 ease-in-out w-full block p-2 flex items-center">
        <input type="checkbox" v-model="assignment.completed" class="mr-1" />
        {{ assignment.name }}
        <span class="text-xs text-slate-500 flex-1 text-right">{{ assignment.tag }}</span>
      </label>
    </li>
  `,

  props: {
    assignment: Object,
  },
}
