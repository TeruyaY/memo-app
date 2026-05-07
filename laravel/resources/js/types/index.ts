export interface Tag {
    id: number;
    color: string;
    name: string;
    hex: string;
}

export interface Memo {
    id: number;
    content: string;
    tag: Tag;
    created_at: string;
}
