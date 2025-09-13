import AssignmentList from "./AssignmentList.js";

export default {
  template: `
  <div class="space-y-8">
      <h1 class="text-2xl font-bold">Assignments</h1>
      
      <form class="relative" @submit.prevent="add">
        <input
          v-model="newAssingmentValue"
          type="text"
          placeholder="New assignment..."
          class="bg-slate-700 rounded-lg transition duration-200 ease-in-out w-full block p-2"
        />
        <button
          type="submit"
          class="absolute top-1 right-1 z-1 bg-slate-800 shadow py-2 px-2 rounded hover:bg-slate-900 transition duration-150 ease-in-out font-semibold text-xs uppercase"
        >
          Create
        </button>
      </form>

      <assignment-list title="Pending" :assignments="pending" />
      <assignment-list title="Completed" :assignments="completed" />
    </div>
  `,

  data() {
    return {
      assignments: [
        { id: 1, name: "Finish project", completed: true },
        { id: 2, name: "Read chapter 4", completed: false },
        { id: 3, name: "Turn in homework", completed: false },
      ],
      newAssingmentValue: ''
    };
  },

  computed: {
    completed() {
      return this.assignments.filter((a) => a.completed);
    },

    pending() {
      return this.assignments.filter((a) => !a.completed);
    },
  },

  components: {
    AssignmentList,
  },

  methods: {
    add() {
      const trimmedValue = this.newAssingmentValue.trim()

      if (trimmedValue.length === 0) return
      
      this.assignments.push({
        name: this.newAssingmentValue,
        completed: false,
        id: this.assignments.at(-1).id + 1,
      })
      this.newAssingmentValue = ''
    }
  }
};
