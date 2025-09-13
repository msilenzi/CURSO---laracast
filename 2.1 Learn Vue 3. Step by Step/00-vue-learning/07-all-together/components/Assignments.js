import AssignmentList from "./AssignmentList.js";
import AssignmentCreate from "./AssignmentCreate.js";

export default {
  template: `
  <div class="space-y-8">
      <h1 class="text-2xl font-bold">Assignments</h1>
      
      <assignment-create @create="addAssignment" />

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
    AssignmentCreate
  },

  methods: {
    addAssignment(name) {
      this.assignments.push({
        name,
        completed: false,
        id: this.assignments.at(-1).id + 1,
      });
    },
  },
};
