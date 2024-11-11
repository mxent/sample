interface User {
    id: number;
    name: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    users: User[];
};
