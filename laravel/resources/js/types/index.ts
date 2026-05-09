export interface Tag {
    id: number;
    color: string;
    name: string;
    hex: string;
}

export interface Memo {
    id: number;
    content: string;
    tags: Tag[];
    created_at: string;
}
