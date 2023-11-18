import { Component } from '@angular/core';
import { DynamicDialogRef } from 'primeng/dynamicdialog';
import { ChatService } from '@services/chat-services/chat.service';

@Component({
  selector: 'app-api',
  template: `
    <div class="flex flex-column gap-2">
      <div>
        OpenAI API Key required to use the Chat feature. The key will be
        encrypted and stored locally.
      </div>
      <div class="api-key-form w-full">
        <input
          #apiKeyInput
          [autofocus]="true"
          pInputText
          type="password"
          class="w-full p-fluid"
          id="api-key-input"
          (keydown.enter)="saveApiKey(apiKeyInput.value)"
        />
      </div>
      <div class="flex flex-row w-full justify-content-end">
        <button pButton (click)="saveApiKey(apiKeyInput.value)">Submit</button>
      </div>
    </div>
  `,
  styles: [],
})
export class ChatApiComponent {
  constructor(private ref: DynamicDialogRef, private chat: ChatService) {}

  async saveApiKey(apiKey: string) {
    this.chat.setApiKey(apiKey).subscribe(
      (result: { success: boolean }) => {
        this.ref.close(result.success);
      },
      () => {
        this.ref.close(false);
      }
    );
  }
}
